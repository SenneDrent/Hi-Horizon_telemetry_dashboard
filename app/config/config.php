<?php


$dirPathLib = [
    'MODEL_PATH' => APPLICATION_PATH . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR,
    'VIEW_PATH' => APPLICATION_PATH . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR,
    'LIB_PATH' => APPLICATION_PATH . DIRECTORY_SEPARATOR . 'lib' . DIRECTORY_SEPARATOR,
    'IMG_PATH' => APPLICATION_PATH . DIRECTORY_SEPARATOR . 'img' . DIRECTORY_SEPARATOR, 
    'STYLE_PATH' => APPLICATION_PATH . DIRECTORY_SEPARATOR . 'style' . DIRECTORY_SEPARATOR,
    'DATABASE_PATH' => APPLICATION_PATH . DIRECTORY_SEPARATOR . 'database' . DIRECTORY_SEPARATOR,
    'JS_PATH' => APPLICATION_PATH . DIRECTORY_SEPARATOR . 'lib' . DIRECTORY_SEPARATOR . 'js' . DIRECTORY_SEPARATOR,
    'PHP_PATH' => APPLICATION_PATH . DIRECTORY_SEPARATOR . 'lib' . DIRECTORY_SEPARATOR . 'php' . DIRECTORY_SEPARATOR,
    'MODULES_PATH' => APPLICATION_PATH . DIRECTORY_SEPARATOR . 'lib' . DIRECTORY_SEPARATOR . 'modules' . DIRECTORY_SEPARATOR,    
];
require $dirPathLib['PHP_PATH'] . 'functions.php';
$style = $dirPathLib['STYLE_PATH'] . 'main.css';

$css = file_get_contents($style);

//connects main database to the page
date_default_timezone_set('Europe/Amsterdam');
$db = new PDO("sqlite:". $dirPathLib['DATABASE_PATH'] ."boatTables.sqlite3");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//connects recordings database to the page
$myroot = $_SERVER["DOCUMENT_ROOT"];
$cmd = "ATTACH DATABASE '". $dirPathLib['DATABASE_PATH'] ."recordings.sqlite3' AS rdb";
$db->exec($cmd);


//gets all the datatypes and settings and puts it into a array
$sql = "SELECT * FROM dataTypes";
$statement = $db->query($sql);
$dataTypes = $statement->fetchall(PDO::FETCH_ASSOC);
?>


