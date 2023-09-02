<?php

function getPar($par, $default = null) {
    if(isset($_GET[$par]) && strlen($_GET[$par])) return $_GET[$par];
    elseif(isset($_POST[$par]) && strlen($_POST[$par])) return $_POST[$par];
    else return $default;
}

function getPage($name, $default='') {
    return isset($_REQUEST[$name]) ? $_REQUEST[$name] : $default;
}

function checkLogin($db) {
    if(isset($_SESSION['userId']))
    {
        $id = $_SESSION['userId'];

        $sql = "select * from users where userName = '$id'";
        $result = $db->query($sql);

        if($result);
        {
            $userData = $result->fetch(PDO::FETCH_ASSOC);
            return $userData;
        }

    }
    header("Location: ?page=login");
    die;
}

function DisplayStat ($stat, $table, $key) {
    global $db;
    $sql = "SELECT ". $stat . " FROM ". $table ." where ". $key ." = (SELECT max(". $key .") FROM ". $table.")";
    $statement = $db->query($sql);
    $result = $statement->fetch();
    $count = $result[0];
    if($table == 'boatVariables') {
        echo $count;
    }
    else{
        return $count;
    }
}