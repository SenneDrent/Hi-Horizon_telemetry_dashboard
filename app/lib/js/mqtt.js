// Create a client instance: Broker, Port, Websocket Path, Client ID
MqttURL = "example.com";
clientInfo = {
    onSuccess: onConnect,
    userName : "user",
    password : "pwrd",
    cleanSession: false,
    useSSL: true
};

client = new Paho.MQTT.Client(MqttURL, Number(8884), "clientId-yahoo");

// set callback handlers
client.onConnectionLost = function (responseObject) {
    console.log("Connection Lost: "+responseObject.errorMessage);
    client.connect(clientInfo);
}

client.onMessageArrived = function (message) {
    decodeMQTTMessage(message);
}

// Called when the connection is made
function onConnect(){
	console.log("Connected!");
    client.subscribe("data");
    client.subscribe("owntracks/admin/sennephone");
}

// Connect the client, providing an onConnect callback
client.connect(clientInfo);

function decodeMQTTMessage(message) {
    if (message.destinationName == "owntracks/admin/sennephone") {
        console.log(message.payloadString)
        var phoneData = JSON.parse(message.payloadString);
        var phoneVelocity = [phoneData["created_at"], phoneData["vel"]];
        var data = new FormData();
        data.append("mqttMessage", JSON.stringify(phoneVelocity));  
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "writePhoneToDb.php");
        xhr.onload = function(){  
            console.log(this.response);
            return this.response;
        };
        xhr.send(data);
    }
    else {
        var dataArray = message.payloadString.split("\n");
        var keyedDataArray = [];
        dataArray.forEach(function (item) {
            keyedDataArray.push(item.split(":"));
        });
        console.log(keyedDataArray);
        var data = new FormData();
        data.append("mqttMessage", JSON.stringify(keyedDataArray));  
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "varwritetodb.php");
        xhr.onload = function(){  
            console.log(this.response);
            return this.response;
        };
        xhr.send(data);
    }   
    return false;
}

function getTopicFromPath(topicPath) {
    var pathArray = topicPath.split("/");
    var topic = pathArray[pathArray.length - 1];
    return topic
}