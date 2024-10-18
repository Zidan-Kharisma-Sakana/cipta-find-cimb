let map;
let marker;
let coordinateOfPinPoint;
function setLatLng(lat, lng) {
    coordinateOfPinPoint = [lat, lng];
    document.getElementById("latitude").value = coordinateOfPinPoint[0];
    document.getElementById("longitude").value = coordinateOfPinPoint[1];
}

function createPinPoint(position) {
    setLatLng(position.coords.latitude, position.coords.longitude);
}

document.addEventListener("DOMContentLoaded", function () {
    // Your code here
    console.log("DOM fully loaded and parsed");
    const lat = document.getElementById("latitude")
    const long = document.getElementById("longitude")
    coordinateOfPinPoint = [Number(lat.value), Number(long.value)]

    map = L.map("map").setView(coordinateOfPinPoint, 15);

    L.tileLayer("https://tile.openstreetmap.org/{z}/{x}/{y}.png", {
        attribution:
            '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
    }).addTo(map);

    marker = new L.marker(coordinateOfPinPoint, { draggable: "true" });
    marker.on("dragend", function (event) {
        var marker = event.target;
        var position = marker.getLatLng();
        marker.setLatLng(new L.LatLng(position.lat, position.lng), {
            draggable: "true",
        });
        map.panTo(new L.LatLng(position.lat, position.lng));
        setLatLng(position.lat, position.lng)
    });
    map.addLayer(marker);
});
