var intervalTime = 50;

function fadeout(element, speed) {
        var op = 1;  // initial opacity
        var timer = setInterval(function () {
            if (op <= speed){
                clearInterval(timer);
                fadein(document.getElementById("timeBar"), speed);
            }
            element.style.opacity = op;
            element.style.filter = 'alpha(opacity=' + op * 100 + ")";
            op -= op * speed;
        }, intervalTime);
        
    }
function fadein(element, speed) {
        var op = 0.1;  // initial opacity
        var timer = setInterval(function () {
            if (op >= 1){
                clearInterval(timer);
                timerFinishAnimation();
            }
            element.style.opacity = op;
            element.style.filter = 'alpha(opacity=' + op * 100 + ")";
            op += op * speed;
        }, intervalTime);
    }

function timerFinishAnimation() {
    if(timerFinished == 1) {
        $("#timeBar").css({"width": "100%"});
        
        fadeout(document.getElementById("timeBar"), 0.25);
    }
}
    