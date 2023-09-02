<?php
    defined('APPLICATION_PATH') || define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/app'));
    //connects config file to this page
    require APPLICATION_PATH . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'config.php';

    $mqtt = json_decode(getPar("mqttMessage"));
    $time = $mqtt[0];
    $vel = $mqtt[1];

    try {
        $db->beginTransaction();

        $sql = "INSERT OR IGNORE INTO boatVariables (time) VALUES ($time)";
        $db->query($sql);

        $sql = "UPDATE boatVariables SET vel = ". $vel ." WHERE time = $time";
        $db->query($sql);

        $db->commit(); 
    }
    catch (Exception $e) {
        echo $e;
    }
?>

