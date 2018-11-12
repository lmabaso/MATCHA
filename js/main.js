var video = document.querySelector('#camera-stream'),
    image = document.querySelector('#snap'),
    start_camera = document.querySelector('#start-camera'),
    controls = document.querySelector('.controls'),
    take_photo_btn = document.querySelector('#take-photo'),
    delete_photo_btn = document.querySelector('#delete-photo'),
    download_photo_btn = document.querySelector('#save-photo'),
    error_message = document.querySelector('#error-message'),
    select_pic = document.querySelector('#upload-file-local'),
    upload_pic = document.querySelector('#upload-pic');

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
  var snap = takeSnapshot(); 
  image.setAttribute('src', snap);
  image.classList.add("visible");
  delete_photo_btn.classList.remove("disabled");
  download_photo_btn.classList.remove("disabled");

//   download_photo_btn.href = snap;
  video.pause();
});


delete_photo_btn.addEventListener("click", function(e)
{
    e.preventDefault();
    image.setAttribute('src', "");
    image.classList.remove("visible");
    delete_photo_btn.classList.add("disabled");
    download_photo_btn.classList.add("disabled");
    video.play();
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

// var video = document.getElementById('video');
var canvas = document.querySelector('canvas');
var ctx = canvas.getContext('2d');
// var photo = document.getElementById('photo');
// var tmp;
var input = document.querySelector('input[type="file"]');

// (function()
// {
//     navigator.getMedia =    navigator.getUserMedia ||
//                             navigator.webkitGetUserMedia ||
//                             navigator.mozGetUserMedia ||
//                             navigator.mediaDevices.getUserMedia||
//                             navigator.msGetUserMedia;
//     navigator.getMedia({
//         video: true,
//         audio: false
//     }, function(stream) {
//         video.srcObject = stream;
//         video.play();
//     }, function (error) {

//     });

input.addEventListener('change', function(e){
    const reader = new FileReader();
    canvas.style = "display:block";
    var img1 = new Image();
    var width = video.videoWidth,
        height = video.videoHeight;
    img1.onload = function() {
        canvas.width = width;
        canvas.height = height;
        ctx.drawImage(img1, 0, 0, width, height);
    }
    reader.onload = function() {
        img1.src = reader.result;
    }
    reader.readAsDataURL(input.files[0]);
}, false);
// }) ();

// function capture(data)
// {
//     if (data === "capture")
//     {
//         ctx.drawImage(video, 0, 0, 400, 300);
//         document.getElementById('canvas').style = "display:block";
//         document.getElementById('video').style = "display:none";
//         document.getElementById("capture").style = "display:none";
//         document.getElementById('new').style = "display:block";
//         photo.setAttribute('value', canvas.toDataURL('Image/png'));
//         document.getElementById('photoform').disabled = false;
//     }
//     else if (data === "new")
//     {
//         document.getElementById('canvas').style = "display:none";
//         document.getElementById('video').style = "display:block";
//         document.getElementById("capture").style = "display:block";
//         document.getElementById("new").style = "display:none";
//         document.getElementById("upload").style = "display:none";
//         document.getElementById('photoform').disabled = true;
//     }
//     else if (data === "camera")
//     {
//         document.getElementById('camera').style = "display:block";
//         document.getElementById('cam').style = "display:none";
//         document.getElementById('upl').style = "display:none";
//         document.getElementById('photoform').disabled = false;
//         photo.setAttribute('value', canvas.toDataURL('Image/png'));
//     }
//     else if (data === "upload")
//     {
//         document.getElementById('camera').style = "display:block";
//         document.getElementById('canvas').style = "display:block";
//         document.getElementById('video').style = "display:none";
//         document.getElementById("capture").style = "display:none";
//         document.getElementById('new').style = "display:none";
//         photo.setAttribute('value', canvas.toDataURL('Image/png'));
//         document.getElementById('photoform').disabled = false;
//         document.getElementById('upl').style = "display:none";
//         document.getElementById('cam').style = "display:none";
//     }

// }