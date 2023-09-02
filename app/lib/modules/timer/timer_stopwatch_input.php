<?php

function getPar($par, $default = null) {
  if(isset($_GET[$par]) && strlen($_GET[$par])) return $_GET[$par];
  elseif(isset($_POST[$par]) && strlen($_POST[$par])) return $_POST[$par];
  else return $default;
}

$timeFlowStart = getPar('hasStarted');
$timeFlowStop = getPar('hasStopped');

$hasStarteddir = "txtfiles/hasStarted.txt";
$hasStoppeddir = "txtfiles/hasStopped.txt";
$isTimeSetdir = "txtfiles/isTimeSet.txt";
$timeAmountSetdir = "txtfiles/timeAmountSet.txt";
$timeStarteddir = "txtfiles/timeStarted.txt";

$file = fopen($hasStarteddir,"r");
$hasStarted = fread($file, filesize($hasStarteddir));
fclose($file);

$file = fopen($hasStoppeddir,"r");
$hasStopped = fread($file, filesize($hasStoppeddir));
fclose($file);

$file = fopen($isTimeSetdir,"r");
$isTimeSet = fread($file, filesize($isTimeSetdir));
fclose($file);

if ((getPar('timeSetS') != NULL || getPar('timeSetM') != NULL|| getPar('timeSetH') != NULL) && $hasStarted == 0) {
  $hours = getPar('timeSetH');
  $minutes = getPar('timeSetM');
  $seconds = getPar('timeSetS');

  $timeAmount = ($hours * 3600) + ($minutes * 60) + $seconds;

  $timeFlowFile = fopen($timeAmountSetdir, "w");
  fwrite($timeFlowFile, $timeAmount);
  $timeFlowFile = fopen($isTimeSetdir, "w");
  fwrite($timeFlowFile, "1");
}

if ($timeFlowStart == 'true' && $isTimeSet != null && $hasStarted == 0) {
  $timeFlowFile = fopen($hasStarteddir, "w");
  fwrite($timeFlowFile, "1");

  $timeFlowFile = fopen($timeStarteddir, "w");
  fwrite($timeFlowFile, time());
}
if ($timeFlowStop == 'false') {
  $timeFlowFile = fopen($hasStarteddir, "w");
  fwrite($timeFlowFile, "0");
  $timeFlowFile = fopen($hasStoppeddir, "w");
  fwrite($timeFlowFile, "0");
  $timeFlowFile = fopen($isTimeSetdir, "w");
  fwrite($timeFlowFile, "0");
  $timeFlowFile = fopen($timeAmountSetdir, "w");
  fwrite($timeFlowFile, "null");
}
?>