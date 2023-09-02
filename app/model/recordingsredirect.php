<?php
    $task = getPar('task');
    $name = getPar('name');

    if ($task == 'delete') {
        $sql = "DROP TABLE rdb.". $name;
        $db->query($sql);
    }
    header("location: index.php?page=recordingmenu");
    die();
?>