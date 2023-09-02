//waarde om te kijken of tiemr is gestopt, voor de eindanimatie
var timerFinished = 0;
var stepCheck = 0;
var runOnce = 0;

var eStelaFrame = document.getElementById("estelaMap");
console.log(eStelaFrame);

function updateStats(data) {
  //timer refresh
  // $.getJSON("app/lib/modules/timer/timerstopwatch.php", loadlink);
  //data refresh
  dashboardDisplay.updateData(data);
  // if (stepCheck % 3 == 0) dashboardDisplay.updateGraphs();
  // stepCheck++;

  //gets updated values coordinates
  var xCord = dashboardDisplay.data.find(data => { return data["name"] == "gpsX"});
  var yCord = dashboardDisplay.data.find(data => { return data["name"] == "gpsY"});

  //centers view to dot on load
  if (runOnce == 0) {
    map.setView([xCord["value"], yCord["value"]], standardZoom);
    runOnce = 1;
  }
  //updates coordinates
  circle.setLatLng([xCord["value"], yCord["value"]]);

  //centers view to dot if pin checkobox is checked
  if (isPinned == true) {
    map.setView([xCord["value"], yCord["value"]], standardZoom);
  }
  

  var timeCurrent = Math.floor(new Date().getTime() / 1000);
  timeSinceLastUpdate = timeCurrent - data['time'];

  //check om te kijken wanneer de laatste waarde update is
  document.getElementById("latencyTextBox").innerHTML = "time since last POST: " + timeSinceLastUpdate + "s";
  
  //make the text red if it takes too long until the next update
  if (timeSinceLastUpdate >= 20)  $("#latencyTextBox").css({"color": '#c82333'});
  else                            $("#latencyTextBox").css({"color": '#fff'});

  //racecalc autoupdates:
  //timetrial
  // autoBerekening('sGevarenTimetrialCheckbox', 'sGevarenTimetrialInput', distanceSailed.amount);
  // autoBerekening('pZonTimetrialCheckbox', 'pZonTimetrialInput', pZon.amount);

  // eUsedRaceCalcTimeTrial = parseInt(document.getElementById('eUsedTimetrialInput').value);
  // eTotalTimeTrial = parseFloat(document.getElementById('eTotalTimetrialInput').value);
  // raceDistance = parseInt(document.getElementById('sTotalTimetrialInput').value);
  // pZonTimeTrial = parseInt(document.getElementById('pZonTimetrialInput').value);
  
  // percentCalc('eOverTimetrialCheckbox', 'eOverTimetrialInput', eTotalTimeTrial, (eTotalTimeTrial - eUsedRaceCalcTimeTrial));
  // pMotorTimeTrial = pMotorCalcTimeTrial(pZonTimeTrial, eTotalTimeTrial, eUsedRaceCalcTimeTrial, raceDistance);
  // document.getElementById("pMotorTimetrial").innerHTML = "P motor: " + pMotorTimeTrial + "W";

  // //endurance
  // autoBerekening('pZonEnduranceCheckbox', 'pZonEnduranceInput', pZon.amount);

  // eUsedRaceCalc = parseFloat(document.getElementById('eUsedEnduranceInput').value);
  // eTotal = parseFloat(document.getElementById('eTotalEnduranceInput').value);
  // eOverpercent = parseFloat(document.getElementById('eOverEnduranceInput').value);
  // tOver = parseInt(document.getElementById('tOverEnduranceInput').value);
  // pZonEndurance = parseInt(document.getElementById('pZonEnduranceInput').value);
  
  
  // percentCalc('eOverEnduranceCheckbox', 'eOverEnduranceInput', eTotal, (eTotal - eUsedRaceCalc));
  // pMotor = pMotorCalc(pZonEndurance, eOverpercent, eTotal, tOver);
  // document.getElementById("pMotorEndurance").innerHTML = "P motor: " + pMotor + "W";

}
  
function updateGraphs(data) {
  // if(data){
  //   pZonChartInstance.data.labels.push(+new Date());
  //   pZonChartInstance.data.datasets.forEach((dataset) =>{dataset.data.push(parseInt(data['ps']))});
    
  //   speedChartInstance.data.labels.push(+new Date());
  //   speedChartInstance.data.datasets.forEach((dataset) =>{dataset.data.push(parseInt(data['v']))});

  //   distanceSailedChartInstance.data.labels.push(+new Date());
  //   distanceSailedChartInstance.data.datasets.forEach((dataset) =>{dataset.data.push(parseInt(data['s']))});

  //   tempMotorChartInstance.data.labels.push(+new Date());
  //   tempMotorChartInstance.data.datasets.forEach((dataset) =>{dataset.data.push(parseInt(data['tm']))});

  //   voltChartInstance.data.labels.push(+new Date());
  //   voltChartInstance.data.datasets.forEach((dataset) =>{dataset.data.push(parseInt(data['u']))});

  //   if(updateCount > numberElements){
  //     pZonChartInstance.data.datasets[0].data = simplifyGraph(pZonChartInstance.data.datasets[0].data);
  //     pZonChartInstance.data.labels = simplifyGraph(pZonChartInstance.data.labels);
  //     distanceSailedChartInstance.data.datasets[0].data = simplifyGraph(distanceSailedChartInstance.data.datasets[0].data);
  //     distanceSailedChartInstance.data.labels = simplifyGraph(distanceSailedChartInstance.data.labels);
  //     tempMotorChartInstance.data.datasets[0].data = simplifyGraph(tempMotorChartInstance.data.datasets[0].data);
  //     tempMotorChartInstance.data.labels = simplifyGraph(tempMotorChartInstance.data.labels);
  //     voltChartInstance.data.datasets[0].data = simplifyGraph(voltChartInstance.data.datasets[0].data);
  //     voltChartInstance.data.labels = simplifyGraph(voltChartInstance.data.labels);

  //     updateCount = Math.floor(updateCount / 2);
  //   }
  //   else {
  //     updateCount++;
  //   }
  //   pZonChartInstance.update();
  //   speedChartInstance.update();
  //   distanceSailedChartInstance.update();
  //   tempMotorChartInstance.update();
  //   voltChartInstance.update();
  // }
}

$(document).ready(function() {
  function updateData() {
    $.getJSON("valuesend.php", updateStats);
    setTimeout(updateData, 1000);
  }

  updateData();
});
