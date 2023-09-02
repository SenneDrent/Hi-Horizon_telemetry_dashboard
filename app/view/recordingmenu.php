<?php include $dirPathLib['LIB_PATH'] . 'modules/navbar.php'?>

<?php
    if (!getPar('recording')) {
        require $dirPathLib['MODULES_PATH'] . 'recordingsys/selectlist.php';
    }
    else {
        $tableName = getPar('recording');
        require $dirPathLib['MODULES_PATH'] . "recordingsys/recordingDisplay.php";
    }
?>

<script type="text/javascript" src="app/lib/js/functions.js"></script>