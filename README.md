# Hi-Horizon_telemetry_dashboard
Legacy telemetry dashboard for Hi-horizon racing team.

## Setup

### MQTT
in the mqtt.js file, you need to enter your mqtt broker and user information in these variables:
```
MqttURL = "example.com";
clientInfo = {
    onSuccess: onConnect,
    userName : "user",
    password : "pwrd",
    cleanSession: false,
    useSSL: true
};
```
