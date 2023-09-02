<?php
  $file = fopen("txtfiles/timeAmountSet.txt","r");
  $timeAmountSet = fread($file, filesize("txtfiles/timeAmountSet.txt"));
  fclose($file);
  if ($timeAmountSet == "null"){
    $timeAmountSet = null;
  }

  $file = fopen("txtfiles/timeStarted.txt","r");
  $timeStarted = fread($file, filesize("txtfiles/timeStarted.txt"));
  fclose($file);

  $file = fopen("txtfiles/hasStarted.txt","r");
  $hasStarted = fread($file, filesize("txtfiles/hasStarted.txt"));
  fclose($file);

  $file = fopen("txtfiles/hasStopped.txt","r");
  $hasStopped = fread($file, filesize("txtfiles/hasStopped.txt"));
  fclose($file);
  
  if (isset($timeAmountSet)) {

    if($hasStarted == 1) {
      if($hasStopped == 0) {
        $timeOver = ($timeAmountSet + $timeStarted) - time();
      }
      //als timer gestopt is, weergeef de hele tijd 0
      elseif($hasStopped == 1) {
        $timeOver = 0;
        $timeOverDisplay = "00 : 00 : 00";
      }
    }
    //houd de tijd goed als de timer nog niet gestart is
    elseif ($hasStarted == 0){
      $timeOver = $timeAmountSet; 
    }

    //geeft aan dat de timer gestopt is
    if ($timeOver <= 0 && $hasStarted == 1 && $hasStopped == 0) {
      $timeFlowFile = fopen("txtfiles/hasStopped.txt", "w");
      fwrite($timeFlowFile, "1");
    }
    
    if (isset($timeOver) == true) {
      $timeOverSeconds = ($timeOver % 3600) % 60;
      $timeOverMinutes = (($timeOver - $timeOverSeconds) % 3600) / 60;
      $timeOverHours = ($timeOver - $timeOverSeconds - ($timeOverMinutes * 60)) / 3600;
      $timeOverDisplay = sprintf('%02d', $timeOverHours). " : " .sprintf('%02d', $timeOverMinutes). " : " .sprintf('%02d', $timeOverSeconds);
    }
    else {
      $timeOverDisplay == null;
    }
      $barWidth = (($timeOver / $timeAmountSet) * 100). '%';
  }
  else {
    $barWidth = 0;
    $timeOverDisplay = null;
  }
  echo json_encode(array("barWidth" => $barWidth,"timeOverDisplay" => $timeOverDisplay));
?>