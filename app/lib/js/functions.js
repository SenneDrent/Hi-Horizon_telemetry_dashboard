function revealObject(hiddenObjectId, buttonId, onButtonText, offButtonText) {
    if (document.getElementById(buttonId).innerHTML == onButtonText) {
            document.getElementById(hiddenObjectId).hidden = true;
            document.getElementById(buttonId).innerHTML = offButtonText;
    }
    else if (document.getElementById(buttonId).innerHTML == offButtonText) {
            document.getElementById(hiddenObjectId).hidden = false;
            document.getElementById(buttonId).innerHTML = onButtonText;
    }
}

function confirmDelete() {
        var agree= confirm("are you sure you want to delete this?");
        if(agree) return true;
        else     return false;
}

function ajaxCall(dir, exportdata) {
        data = new FormData();
        data.append(exportdata);

        var xhr = new XMLHttpRequest();
        xhr.open("POST", dir);
        xhr.onload = function(){
                return this.response;
        };
        xhr.send(data);
}

function loadlink(data){
        timeOverDisplay = data['timeOverDisplay'];
        if (timerFinished == 0) {
                document.getElementById('timeText').innerHTML = timeOverDisplay;
                document.getElementById("timeBar").style.width = data['barWidth'];
        }
        if(timeOverDisplay == "00 : 00 : 00" && timerFinished == 0) {
                timerFinished = 1;
                timerFinishAnimation();
        }
            
}

function ajaxgo() {
        var data = new FormData();
        data.append("timeSetH", document.getElementById("timeSetH").value);
        data.append("timeSetM", document.getElementById("timeSetM").value);
        data.append("timeSetS", document.getElementById("timeSetS").value);
    
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "app/lib/modules/timer/timer_stopwatch_input.php");
        xhr.onload = function(){
        };
        xhr.send(data);
    
        
        return false;
    }
    
function ajaxgetit(id) {
        if (id == 'hasStopped') {
                checkonce = 0;
                timerFinished = 0;
        }
        var data = new FormData();
        data.append(id, document.getElementById(id).value);  
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "app/lib/modules/timer/timer_stopwatch_input.php");
        xhr.onload = function(){
        };
        xhr.send(data);
        return false;
    }

function startRecording(state) {
        document.getElementById("recordButton").setAttribute("onclick", "stopRecording()");
        document.getElementById("recordButton").innerHTML = "stop" ;

        if (state == 'new') {
                var data = new FormData();
                data.append("record","startRecord");
                var xhr = new XMLHttpRequest();
                xhr.open("POST", "app/lib/modules/recordingsys/recordInput.php");
                xhr.onload = function(){
                };
                xhr.send(data);
                return false;
        }

        if (document.getElementById("saveNameTextBox") != null) {
                document.getElementById("saveNameTextBox").setAttribute("style", "display: none");
                document.getElementById("saveButton").setAttribute("style", "display: none");
                document.getElementById("deleteButton").setAttribute("style", "display: none");
        }
}

function stopRecording() {
        document.getElementById("recordButton").setAttribute("onclick", "startRecording('continue')");
        document.getElementById("recordButtonContainer").setAttribute("class", "col-lg-2 col-md-2 col-sm-12");
        document.getElementById("recordButton").innerHTML = "continue";

        document.getElementById("saveNameTextBox").setAttribute("style", "display: inline");
        document.getElementById("saveButton").setAttribute("style", "display: inline");
        document.getElementById("deleteButton").setAttribute("style", "display: inline");

        var data = new FormData();
        data.append("record","stopRecord");
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "app/lib/modules/recordingsys/recordInput.php");
        xhr.onload = function(){
        };
        xhr.send(data);
        return false;
}

function deleteRecording() {
        var confirm = confirmDelete();
        if (confirm) {
                document.getElementById("recordButton").setAttribute("onclick", "startRecording('new')");
                document.getElementById("recordButtonContainer").setAttribute("class", "col-lg-2 col-md-2 col-sm-12");
                document.getElementById("recordButton").innerHTML = "record";

                if (document.getElementById("saveNameTextBox") != null) {
                        document.getElementById("saveNameTextBox").setAttribute("style", "display: none");
                        document.getElementById("saveButton").setAttribute("style", "display: none");
                        document.getElementById("deleteButton").setAttribute("style", "display: none");
                }
        }
}

function saveRecording() {
        var name = document.getElementById('saveNameTextBox').value;
        if (!name) {
                alert('please fill in a name for this recording');
        }
        else {
                var data = new FormData();
                data.append("recordName", name);
                var xhr = new XMLHttpRequest();
                xhr.open("POST", "app/lib/modules/recordingsys/recordInput.php");
                xhr.onload = function(){
                        alert(this.response);
                        if (this.response == "recording succesfully saved!") {
                                document.getElementById("recordButton").setAttribute("onclick", "startRecording('new')");
                                document.getElementById("recordButtonContainer").setAttribute("class", "col-lg-2 col-md-2 col-sm-12");
                                document.getElementById("recordButton").innerHTML = "record";
                                
                                document.getElementById("saveNameTextBox").setAttribute("style", "display: none");
                                document.getElementById("saveButton").setAttribute("style", "display: none");
                                document.getElementById("deleteButton").setAttribute("style", "display: none");
                        }
                };
                xhr.send(data);
                return false;
        }

}