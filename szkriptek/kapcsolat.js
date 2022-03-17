
function initMap() {
    // The location of Uluru
    const uluru = { lat: 46.2504, lng: 20.1448 };
    // The map, centered at Uluru
    const map = new google.maps.Map(document.getElementById("terkep"), {
        zoom: 17,
        center: uluru,
    });
    // The marker, positioned at Uluru
    const marker = new google.maps.Marker({
        position: uluru,
        map: map,
    });
}
