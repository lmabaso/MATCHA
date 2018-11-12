function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(loadPosition);
    } else {
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
}
function loadPosition(position) {
    $.ajax({
        url: "ajax.php",
        type: "POST",
        data:  {position: 'true', lat: position.coords.latitude, long: position.coords.longitude},
        success: function (response) {        
            console.log("suceess")
        }
    });
}

getLocation();