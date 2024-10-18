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
}

function getLocation(map) {
    if ("geolocation" in navigator) {
        let result;
        navigator.geolocation.getCurrentPosition(createPinPoint, onError);
        return result;
    } else {
        console.error("Geolocation is not supported by this browser.");
    }
}

document.addEventListener("DOMContentLoaded", function () {
    // Your code here
    console.log("DOM fully loaded and parsed");
    map = L.map("map").setView([-6.1754, 106.8272], 11);

    L.tileLayer("https://tile.openstreetmap.org/{z}/{x}/{y}.png", {
        attribution:
            '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
    }).addTo(map);

    getLocation();
});

function onError(error) {
    switch (error.code) {
        case error.PERMISSION_DENIED:
            console.error("User denied the request for Geolocation.");
            break;
        case error.POSITION_UNAVAILABLE:
            console.error("Location information is unavailable.");
            break;
        case error.TIMEOUT:
            console.error("The request to get user location timed out.");
            break;
        case error.UNKNOWN_ERROR:
            console.error("An unknown error occurred.");
            break;
    }
    confirm("You must allow location access to use this feature");
}
