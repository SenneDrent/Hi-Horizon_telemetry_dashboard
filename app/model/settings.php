<?php
$error = getPar('error');
if($error) {
    echo '<script language="javascript">';
    echo "alert('".$error."')";
    echo '</script>';
}
?>