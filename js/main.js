var video = document.querySelector('#camera-stream'),
    image = document.querySelector('#snap'),
    start_camera = document.querySelector('#start-camera'),
    controls = document.querySelector('.controls'),
    take_photo_btn = document.querySelector('#take-photo'),
    delete_photo_btn = document.querySelector('#delete-photo'),
    download_photo_btn = document.querySelector('#save-photo'),
    error_message = document.querySelector('#error-message'),
    select_pic = document.querySelector('#upload-file-local'),
    add_interest_btn = document.querySelector('#add_interest'),
    upload_pic = document.querySelector('#upload-pic'),
    snap = ""; 

navigator.getMedia =    navigator.getUserMedia ||
                        navigator.webkitGetUserMedia ||
                        navigator.mozGetUserMedia ||
                        navigator.mediaDevices.getUserMedia||
                        navigator.msGetUserMedia;


if (!navigator.getMedia)
{
  displayErrorMessage("Your browser doesn't have support for the navigator.getUserMedia interface.");
}
else
{
    navigator.getMedia({
        video: true,
        audio: false
    }, function(stream) {
        video.srcObject = stream;
        video.play();
    }, function (error) {
        displayErrorMessage("There was an error with accessing the camera stream: " + error.name, error);
    });
}

start_camera.addEventListener("click", function(e)
{
    start_camera.style = "display: none";
    upload_pic.style = "display: none";
    e.preventDefault();
    video.play();
    showVideo();
});


upload_pic.addEventListener("click", function(e)
{
    start_camera.style = "display: none";
    upload_pic.style = "display: none";
    e.preventDefault();
    select_pic.style = "display: block";
});

take_photo_btn.addEventListener("click", function(e)
{
  e.preventDefault();
  snap = takeSnapshot(); 
  image.setAttribute('src', snap);
  image.classList.add("visible");
  delete_photo_btn.classList.remove("disabled");
  download_photo_btn.classList.remove("disabled");

//   download_photo_btn.href = snap;
  video.pause();
});

download_photo_btn.addEventListener('click', function(e)
{
    e.preventDefault()
    $.ajax({
        url: "ajax.php",
        type: "POST",
        data:  {upload: 'true', pic_id: snap, token: document.getElementById('token').value},
        success: function (response) {        
            alert("suceess")
        }
    });
})

delete_photo_btn.addEventListener("click", function(e)
{
    e.preventDefault();
    image.setAttribute('src', "");
    image.classList.remove("visible");
    delete_photo_btn.classList.add("disabled");
    download_photo_btn.classList.add("disabled");
    video.play();
});

add_interest_btn.addEventListener('click', function(e)
{
    e.preventDefault();
    $.ajax({
        url: "ajax.php",
        type: "POST",
        data:  {add_interest: 'true', interest: document.getElementById('interests').value},
        success: function (response) {        
            alert("suceessfully added")
        }
    });
});

function showVideo()
{
    hideUI();
    video.classList.add("visible");
    controls.classList.add("visible");
}

function takeSnapshot()
{
    var hidden_canvas = document.querySelector('canvas'),
        context = hidden_canvas.getContext('2d');
    var width = video.videoWidth,
        height = video.videoHeight;
        
    if (width && height)
    {
        hidden_canvas.width = width;
        hidden_canvas.height = height;
        context.drawImage(video, 0, 0, width, height);
        return hidden_canvas.toDataURL('image/png');
    }
}


function displayErrorMessage(error_msg, error)
{
    error = error || "";
    if(error)
    {
        console.log(error);
    }
    error_message.innerText = error_msg;
    hideUI();
    error_message.classList.add("visible");
}


function hideUI(){
    controls.classList.remove("visible");
    start_camera.classList.remove("visible");
    video.classList.remove("visible");
    snap.classList.remove("visible");
    error_message.classList.remove("visible");
}

var canvas = document.querySelector('canvas');
var ctx = canvas.getContext('2d');
var input = document.querySelector('input[type="file"]');

input.addEventListener('change', function(e){
    const reader = new FileReader();
    var img1 = new Image();
    var width = video.videoWidth,
        height = video.videoHeight;
    img1.onload = function() {
        canvas.width = width;
        canvas.height = height;
        ctx.drawImage(img1, 0, 0, width, height);
        image.setAttribute('src', canvas.toDataURL('image/png'));
        image.setAttribute('width', width);
        image.classList.add("visible");
    }
    reader.onload = function() {
        img1.src = reader.result;
    }
    reader.readAsDataURL(input.files[0]);
}, false);