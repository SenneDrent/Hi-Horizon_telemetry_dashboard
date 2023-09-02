<?php
defined('APPLICATION_PATH') || define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/app'));
//connects config file to this page
require APPLICATION_PATH . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'config.php';
?>

<script type="text/javascript">
var dataTypes= <?php echo json_encode($dataTypes);?>;
for (var i = 0; i < dataTypes.length; i++) {
    dataTypes[i]["value"] = parseInt(dataTypes[i]["value"]);
    if (dataTypes[i]["display"] == 1) {
        dataTypes[i]["display"] = true;
    }
    else { dataTypes[i]["display"] = false}
}
</script>

<?php
session_start();

echo "<style type='text/css'>". $css ."</style>";

$page = getPage('page', 'dashboard');
$model = $dirPathLib['MODEL_PATH'] . $page .'.php';
$view = $dirPathLib['VIEW_PATH'] . $page .'.php';

//checks if user is actually logged in
if ($page != 'login' && $page != 'loginprocess') $userData = checkLogin($db);

//gets php and html needed for the page
include $dirPathLib['VIEW_PATH'] . 'layout.php';

if (file_exists($model))    require $model;
if (file_exists($view))     require $view;

if (!file_exists($model) && !file_exists($view)) require $dirPathLib['VIEW_PATH'] . '404.php';
?>


