var standardZoom = 19;
var map = L.map('mapid').setView([0, 0], standardZoom);
//   van deze bende afblijven

L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: standardZoom,    //hij kan niet hoger
    //attribuitions zijn verplicht, dus niet eruit halen Jorian, al vind je het nog zo lelijk
    attribution: '&copy; <a href="http://openstreetmap.org/copyright">OpenStreetMap contributors</a>'
  }).addTo(map);
  L.control.scale().addTo(map);

//maakt de cirkel die de marker is van de boot      
var circle = L.circle([0, 0], 1, {
color: 'red',
fillColor: '#f03',
fillOpacity: 0.5,
}).addTo(map);


var isPinned = false;

function pinToMarker(_checked) {
    if (_checked == true) {
        isPinned = true;
        map.zoomControl.disable();
        map.keyboard.disable();
        map.scrollWheelZoom.disable();
    }
    else if (_checked == false){
        isPinned = false;
        map.zoomControl.enable();
        map.keyboard.enable();
        map.scrollWheelZoom.enable();
    }
}

pinToMarker(document.getElementById("mapPinCheckbox").checked);