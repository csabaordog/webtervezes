
/*
    Ez egy előre megírt függvény a Google Maps importálásához, ami a #terkep elemre
    helyezi el a téképet. Link:
    https://developers.google.com/maps/documentation/javascript/adding-a-google-map
 */

function initMap() {

    const uluru = { lat: 46.2504, lng: 20.1448 };

    const map = new google.maps.Map(document.getElementById("terkep"), {
        zoom: 17,
        center: uluru,
    });

    const marker = new google.maps.Marker({
        position: uluru,
        map: map,
    });
}
