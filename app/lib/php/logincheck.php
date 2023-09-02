<?php
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