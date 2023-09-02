<?php
session_start();

$passWord = getPar('passWord');
$userName = getPar('userName');
echo $passWord;
echo $userName;

if(!empty($userName) && !empty($passWord) && !is_numeric($userName)) {

    $sql = "select * from users where userName = '$userName'";
    $result = $db->query($sql);

    if($result) {
        $userData = $result->fetch(PDO::FETCH_ASSOC);
        if($userData['password'] === $passWord){
            $_SESSION['userId'] = $userData['userName'];
            header("Location: ?page=dashboard");
            die();
        }
    }
}
header("Location: ?page=login");
die();
?>