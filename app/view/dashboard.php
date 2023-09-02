<?php include $dirPathLib['LIB_PATH'] . 'modules/navbar.php'?>

<div class="container-fluid">
  <div class="row">
    <div class="col-lg-4 col-md-4 col-sm-12">

      <!-- <div class="container"> -->
        <!-- gpskaart -->
        <div class="contrast p-3 rounded">
          <div class="accordion" id="mapTrackers">
            <div class="btn-group pb-3" role="group">
                <button type="button" class="btn btn-danger" data-toggle="collapse" data-target="#GPS">GPS</button>
                <button type="button" class="btn btn-danger" data-toggle="collapse" data-target="#Estela">Estela</button>
            </div>

            <div id="GPS" class="collapse show" data-parent="#mapTrackers">
              <div id="mapid"></div>
              <input id="mapPinCheckbox" type="checkbox" checked data-toggle="toggle" onchange="pinToMarker(this.checked)">pin</input>
            </div>
            <!-- <div id="Estela" class="collapse" data-parent="#mapTrackers">
              <iframe id="estelaMap"style="position: relative; height: 60vh; width: 100%;" src="https://estela.co/nl/tracking-race/11440/solar-racing-2023-nk-groenleven-zonnebootrace-rondje-akkrum" frameborder="0" allowfullscreen></iframe>
            </div> -->
          </div>
        </div>


        <!-- endurance/timetrial berekeningen -->
        <!-- <div class="contrast p-3 mt-4 rounded">
          <div class="accordion" id="soortRace">
            <div class="btn-group pb-3" role="group">
              <button type="button" class="btn btn-danger" data-toggle="collapse" data-target="#timetrial">Timetrial</button>
              <button type="button" class="btn btn-danger" data-toggle="collapse" data-target="#endurance">Endurance</button>
            </div>

            <?php #include $dirPathLib['LIB_PATH'] . 'modules/raceCalc/timetrial.php' ?>
            <?php #include $dirPathLib['LIB_PATH'] . 'modules/raceCalc/endurance.php' ?>

          </div>
        </div> -->
        <!-- timer/stopwatch -->
        <!-- <div class="contrast p-3 mt-4 rounded">
          <div class="accordion" id="tijd">
            <div class="btn-group pb-3" role="group">
              <button type="button" class="btn btn-danger" data-toggle="collapse" data-target="#timer">Timer</button>
              <button type="button" class="btn btn-danger" data-toggle="collapse" data-target="#stopwatch">Stopwatch</button>
            </div>

            <?php #include $dirPathLib['LIB_PATH'] . 'modules/timer/timerFrontEnd.php' ?>       
            <?php #include $dirPathLib['LIB_PATH'] . 'modules/timer/stopWatchFrontEnd.php' ?>

          </div>
        </div> -->
      <!-- </div> -->
    </div>

    <div class="col-lg-8 col-md-8 col-sm-12">
      <?php include $dirPathLib['LIB_PATH'] . 'modules/datadisplay.php'?>
    </div>
  </div>
</div>

<?php// require("data/dataInklapFrontEnd.php"); ?>


<script type="text/javascript" src="app/lib/js/functions.js"></script>
<script type="text/javascript" src="app/lib/js/raceberekeningen.js"></script>
<script type="text/javascript" src="app/lib/js/graph.js"></script> 
<script type="text/javascript" src="app/lib/js/statclass.js"></script>
<script type="text/javascript" src="app/lib/js/timeranimation.js"></script>
<script type="text/javascript" src="app/lib/js/dashboardDataDisplayInit.js"></script>
<script type="text/javascript" src="app/lib/js/mqtt.js"></script>
<script type="text/javascript" src="app/lib/js/gps.js"></script>
<script type="text/javascript" src="app/lib/js/jsloop.js"></script>


