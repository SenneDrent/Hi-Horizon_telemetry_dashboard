<?php
    defined('APPLICATION_PATH') || define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../../../'));
    //connects config file to this page
    require APPLICATION_PATH . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'config.php';

    function dbExistError() {
        echo "this recording name already exists!";
        die();
    }
    
    $sql = "SELECT time FROM boatVariables where time = (SELECT max(time) FROM boatVariables)";
    $statement = $db->query($sql);
    $result = $statement->fetch();
    
    if (getPar("record") == "startRecord") {
        $timeFlowFile = fopen("txtfiles/startRecord.txt", "w");
        fwrite($timeFlowFile, $result[0]);
        $timeFlowFile = fopen("txtfiles/startRecordTime.txt", "w");
        fwrite($timeFlowFile, time());
    }
    if (getPar("record") == "stopRecord") {
        $timeFlowFile = fopen("txtfiles/stopRecord.txt", "w");
        fwrite($timeFlowFile, $result[0]);
        $timeFlowFile = fopen("txtfiles/stopRecordTime.txt", "w");
        fwrite($timeFlowFile, time());
    }
    if (getPar("recordName")) {
        $newTable = getPar("recordName");

        $file = fopen("txtfiles/startRecord.txt","r");
        $startRecord = fread($file, filesize("txtfiles/startRecord.txt"));
        fclose($file);

        $file = fopen("txtfiles/startRecordTime.txt","r");
        $startRecordTime = fread($file, filesize("txtfiles/startRecordTime.txt"));
        fclose($file);

        $file = fopen("txtfiles/stopRecord.txt","r");
        $stopRecord = fread($file, filesize("txtfiles/stopRecord.txt"));
        fclose($file);

        $file = fopen("txtfiles/stopRecordTime.txt","r");
        $stopRecordTime = fread($file, filesize("txtfiles/stopRecordTime.txt"));
        fclose($file);

        $old_error_handler = set_error_handler("dbExistError", E_USER_WARNING);
        
        try {
            $sql = "CREATE TABLE rdb.". $newTable ." AS SELECT * FROM boatVariables WHERE time >= " . $startRecord . " AND time <= ". $stopRecord;
            $statement = $db->query($sql);
            
            $sql = "SELECT COUNT() from " . $newTable;
            $statement = $db->query($sql);
            $result = $statement->fetch();

            if ($startRecord != $startRecordTime) {
                $sql = "UPDATE rdb.". $newTable ." SET time = ". $startRecordTime ." WHERE time = (SELECT min(time) FROM rdb.". $newTable .")" ;
                $statement = $db->query($sql);
            }
            if ($result[0] == 1) {
                $sql = "CREATE TEMPORARY TABLE tmp AS SELECT * FROM rdb.". $newTable;
                $db->query($sql);
                $sql = "UPDATE tmp SET time = ". $stopRecordTime;
                $db->query($sql);
                $sql = "INSERT INTO rdb.". $newTable ." SELECT * FROM tmp";
                $db->query($sql);
                $sql = "DROP TABLE tmp";
                $db->query($sql);
            }
            else {
                if ($stopRecord != $stopRecordTime) {
                    $sql = "UPDATE rdb.". $newTable ." SET time = ". $stopRecordTime ." WHERE time = (SELECT max(time) FROM rdb.". $newTable .")" ;
                    $statement = $db->query($sql);
                }
            }
            echo "recording succesfully saved!";
        } catch (Exception $e) {
            echo "this recording name already exists!";
        }

    }
?>