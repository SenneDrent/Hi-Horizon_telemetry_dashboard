<div id="display">
    <div id="SpecificContainer">
        <canvas id ="test"></canvas>
    </div>
</div>

<script type="text/javascript">
    var specContainer = document.getElementById("SpecificContainer");
    

// for (var i=0;i<6;i++) {
//     var canvas = document.createElement("canvas");
//     canvas.id = i;
//     specContainer.appendChild(canvas);
// }

    // ----- more code ------ 

    // setTimeout(function() {
        // for (var i=0;i<6;i++) {
    var testchart = new Chart(document.getElementById("test"), {
            type: 'line',
            data: {
                labels: [0,1,2,3,4,5,6,7,8,9,10,11,12],
                datasets: [{
                    borderColor: '#c82333',
                    data: [0,1,346,523,546,245,212,576,24,23,7,2,45,57,44,52,7,89,23,6]
                }],
            },
            options: {
                parsing: false,
                animation: false,
                responsive: true,
    // Turn off animations and data parsing for performance
                interaction: {
                mode: 'nearest',
                axis: 'x',
                intersect: false
                },
                plugins: {
                    decimation: {
                    enabled: true,
                    algorithm: 'lttb',
                    samples: 2,
                    threshold: 1,
                    },
                },
                scales: {
                x: {
                        type: 'time',
                        ticks: {
                            source: 'auto',
                            // Disabled rotation for performance
                            maxRotation: 0,
                            autoSkip: true,
                        }
                    }
                }
            }
    });
        // }
    // }, 10);
</script>
