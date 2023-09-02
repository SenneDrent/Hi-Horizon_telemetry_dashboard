<?php
    defined('APPLICATION_PATH') || define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/app'));
    //connects config file to this page
    require APPLICATION_PATH . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'config.php';
    
    $sql = "SELECT * FROM boatVariables where time = (SELECT max(time) FROM boatVariables)";
    $statement = $db->query($sql);
    $result = $statement->fetch();

    header('Content-Type: application/json');
    echo json_encode($result);
?>