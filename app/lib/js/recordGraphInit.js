commonOptions.plugins.title.display = true;
commonOptions.parsing = true;

let recordDisplay = new DataManager(document.getElementById("graphContainer"), dataTypes);


timeResult = result['time'].map(function (x) {return parseInt(x * 1000, 10)}); 

for (var i=0;i<recordDisplay.dataDisplay.length;i++) {
    var canvas = document.createElement("canvas");
    canvas.id = recordDisplay.dataDisplay[i]["name"] + "GraphJs";
    document.getElementById("graphContainer").appendChild(canvas);
}

recordDisplay.initGraph();

for (var i=0;i<recordDisplay.dataDisplay.length;i++) {
    recordDisplay.charts[i].options.plugins.title.text =  recordDisplay.dataDisplay[i]["name"];
    recordDisplay.charts[i].data.datasets[0].data = result[recordDisplay.dataDisplay[i]["abbreviation"]];
    recordDisplay.charts[i].data.labels = timeResult;
    recordDisplay.charts[i].update();
}