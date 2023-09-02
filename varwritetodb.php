<?php
    defined('APPLICATION_PATH') || define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/app'));
    //connects config file to this page
    require APPLICATION_PATH . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'config.php';

    $dataRaw = getPar("d");
    $data = array();
    $token = strtok($dataRaw, ",");
    $mqtt = json_decode(getPar("mqttMessage"));
    while ($token !== false) {
        if(is_numeric($token)) { 
            $waarde = $token; 
            $token = strtok(","); 
        }
        elseif(is_string($token)) { 
            $naam = $token; 
            $waarde = null; 
            $token = strtok(","); 
        }
        else { 
            $waarde = 0; 
            $naam = null; 
        }
           $data["$naam"] = "$waarde";
    }

    function keyCheck($par, $array) {
        if (array_key_exists($par, $array)) {
            return $array[$par];
        }
        else return 0;
    }

    $dataValues = array_values($data);
    $dataKeys = array_keys($data);

    $time = time();

    try {
            $db->beginTransaction();

            $sql = "INSERT OR IGNORE INTO boatVariables (time) 
            VALUES ($time)";
            $db->query($sql);

            
            for ($i = 1; $i < count($mqtt); $i++) {
                $sql = "UPDATE boatVariables SET ". $mqtt[$i][0] ." = ". $mqtt[$i][1] ." WHERE time = $time";
                $db->query($sql);
        }
        $sql = "UPDATE boatVariables SET pm = vm*mc WHERE time = $time";
        $db->query($sql);


        $db->commit(); 
    }
    catch (Exception $e) {
        echo $e;
    }
?>

