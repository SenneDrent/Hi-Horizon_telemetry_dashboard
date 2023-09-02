var time = new Date();
// zorgt voor een actuele weergave van metingen zonder de hele pagina te refreshen
var testdata = [
        {"name":"distanceSailed", "unit":"km" , "abbreviation":"s", "value":0 , "display":true},
        {"name":"speed", "unit":"km/h" , "abbreviation":"v", "value":0 , "display":true},
        {"name":"pZon", "unit":"W" , "abbreviation":"ps", "value":0 , "display":true},
        {"name":"volt", "unit":"V" , "abbreviation":"u", "value":0 , "display":true},  
        {"name":"tempMotor", "unit":"ºC" , "abbreviation":"tm", "value":0 , "display":true},        
        {"name":"gpsX", "unit":"º" , "abbreviation":"gx" , "value":0 , "display":false},
        {"name":"gpsY", "unit":"º" , "abbreviation":"gy" , "value":0 , "display":false},             
];

class DataManager {
        constructor(targetContainers, data) {
                this.targetContainers = targetContainers;
                this.data = data
                this.dataDisplay = Object.values(this.data).filter(function(array) {
                       return array["display"] == true;
                })
                this.charts = [];
        }
        initGraph() {
                for (var i=0;i<this.dataDisplay.length;i++) {                    
                        if (this.dataDisplay[i]["display"] == true) {
                                this.charts.push(new Chart(document.getElementById(this.dataDisplay[i]["name"] + "GraphJs"), {
                                        type: 'line',
                                        data: {
                                                datasets: [{
                                                        label: this.dataDisplay[i]["name"],
                                                        data: [],
                                                        fill: false,
                                                        borderColor: lineColour,
                                                        borderWidth: 3,
                                                        tension: 0
                                                }],
                                                labels: [],
                                        },
                                        options: Object.assign({}, commonOptions,{
                                                })
                                }));
                        }
                }  
        }

        initHtml() {
                var containerCount = 0;
                for (var i=0;i<this.dataDisplay.length;i++) {
                        if (this.dataDisplay[i]["display"] == true) {
                                var statContainer = document.createElement("div");
                                statContainer.id = this.dataDisplay[i]["name"];
                                if (this.targetContainers.length == 1) this.targetContainers[0].appendChild(statContainer);
                                else {
                                        this.targetContainers[containerCount].appendChild(statContainer);
                                        containerCount++;
                                        if (containerCount > this.targetContainers.length - 1) containerCount = 0;          
                                }
                        
                                var title = document.createElement("H3");
                                title.setAttribute("class", "feature-title attribuut");
                                var titletext = document.createTextNode(this.dataDisplay[i]["name"]);
                                title.appendChild(titletext);
                                document.getElementById(this.dataDisplay[i]["name"]).appendChild(title);
                        
                                var display = document.createElement("H1");
                                display.id = this.dataDisplay[i]["name"] + "Counter";
                                display.setAttribute("class", "waarde");
                                var displaytext = document.createTextNode(0);
                                display.appendChild(displaytext);
                                document.getElementById(this.dataDisplay[i]["name"]).appendChild(display);
                                
                                var displayUnit = document.createElement("small");
                                displayUnit.setAttribute("class", "text-muted zij");
                                var displayUnitText = document.createTextNode(this.dataDisplay[i]["unit"]);
                                displayUnit.appendChild(displayUnitText);
                                document.getElementById(this.dataDisplay[i]["name"] + "Counter").appendChild(displayUnit);

                                // var graphButton = document.createElement("button");
                                // graphButton.setAttribute("class", "btn btn-light");
                                // graphButton.setAttribute("data-toggle", "collapse");
                                // graphButton.setAttribute("data-target", "#collapseGraph" + this.dataDisplay[i]["name"]);
                                // graphButton.setAttribute("aria-expanded", "false");
                                // graphButton.setAttribute("aria-controls", "collapseGraph" + this.dataDisplay[i]["name"]);
                                // var graphButtontext = document.createTextNode("grafiek");
                                // graphButton.appendChild(graphButtontext);
                                // document.getElementById(this.dataDisplay[i]["name"]).appendChild(graphButton);
                        
                                // var graphcontainer = document.createElement("div");
                                // graphcontainer.id = this.dataDisplay[i]["name"] + "GraphContainer";
                                // graphcontainer.setAttribute("class", "container padding-bottom");
                                // document.getElementById(this.dataDisplay[i]["name"]).appendChild(graphcontainer);
                        
                                // var graphcollapse = document.createElement("div");
                                // graphcollapse.id =  "collapseGraph" + this.dataDisplay[i]["name"];
                                // graphcollapse.setAttribute("class", "collapse padding-top border-bottom");
                                // document.getElementById(this.dataDisplay[i]["name"] + "GraphContainer").appendChild(graphcollapse);
                        
                                // var canvas = document.createElement("canvas");
                                // canvas.id = this.dataDisplay[i]["name"] + "GraphJs";
                                // document.getElementById("collapseGraph" + this.dataDisplay[i]["name"]).appendChild(canvas);
                        }
                }
                
                // this.initGraph();
        }

        updateData(newValues) {
                for (var i=0;i<this.data.length;i++) {
                        this.data[i]["value"] = newValues[this.data[i]["abbreviation"]];
                        if (this.data[i]["display"] == true) { 
                                document.getElementById(this.data[i]["name"] + "Counter").innerHTML = this.data[i]["value"];
                                var unitElement = document.createElement("SMALL");
                                var unitElementText= document.createTextNode(this.data[i]["unit"]);
                                unitElement.appendChild(unitElementText);
                                unitElement.setAttribute("class", "text-muted zij");
                                document.getElementById(this.data[i]["name"] + "Counter").appendChild(unitElement);  
                        }
                }
        }

        updateGraphs() {
                for (var i=0;i<this.charts.length;i++) {
                        var newData = {x: +new Date(), y: parseInt(this.dataDisplay[i]["value"])};
                        this.charts[i].data.datasets.forEach((dataset) => {dataset.data.push(newData)});
                        this.charts[i].update();
                        if (this.charts[i].data.datasets[0]._data) {
                                this.charts[i].data.datasets.forEach((dataset) => {dataset._data.push(newData)});
                                this.charts[i].update();
                        }
                }
        }

        resetGraphs() {
                this.charts.forEach(function(chart) {
                        chart.data.datasets[0].data = [];
                        chart.data.labels = [];
                        chart.update();
                })
        }
}
