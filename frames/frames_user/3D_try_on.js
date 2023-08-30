// Get the video and canvas elements from the HTML document
var video = document.getElementById('video');
var canvas_oval = document.getElementById('canvas_oval');
var canvas_display = document.getElementById('canvas_display');

var instructions_display = document.getElementById('instructions_display');

// Initialize faceCascade and gray outside the captureImage function
let faceCascade = null;
let gray = null;

// Check if the browser supports getUserMedia
if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
    // Request access to the webcam
    navigator.mediaDevices.getUserMedia({ video: true })
        .then(function(stream) {
            // Set the video source to the webcam stream
            video.srcObject = stream;
            video.play();

            // Adjust the canvas dimensions to match the video feed
            video.addEventListener('loadedmetadata', function() {
                canvas_display.width = video.videoWidth;
                canvas_display.height = video.videoHeight;
            });

        })
        .catch(function(error) {
            console.error("Unable to access the webcam: " + error);
        });
}

// Function to capture an image from the webcam and perform face detection
function captureImage() {
    console.log("captureImage() started");

    instructions_display.style.display = "none";
    canvas_display.style.display = "block";

    // Draw the current frame from the video onto the canvas
    canvas_display.getContext('2d').drawImage(video, 0, 0, canvas_display.width, canvas_display.height);

    // Convert the canvas image to a data URL
    var dataURL = canvas_display.toDataURL('image/jpeg');

    // Store the image data URL in local storage
    localStorage.setItem('Try_On_Image', dataURL);

    var img = document.createElement('img');
    img.src = dataURL;
    img.id = "webcapture";

    img.onload = function() {
        if (!faceCascade) {
            fetch('assests/cascades/haarcascade_frontalface_default.xml')
                .then(response => response.text())
                .then(data => {
                    cv.FS_createDataFile('/', 'haarcascade_frontalface_default.xml', data, true, false, false);

                    faceCascade = new cv.CascadeClassifier();
                    faceCascade.load('haarcascade_frontalface_default.xml');
                    
                    processImage(img);
                })
                .catch(error => {
                    console.error("Error loading XML file:", error);
                });
        } else {
            processImage(img);
        }
    };
}

// Process the image for face detection
function processImage(img) {
    let src = cv.imread(img);
    gray = new cv.Mat();

    cv.cvtColor(src, gray, cv.COLOR_BGR2GRAY);

    let scaleFactor_face = 1.1;
    let minNeighbors_face = 5;

    let faces = new cv.RectVector();
    faceCascade.detectMultiScale(gray, faces, scaleFactor_face, minNeighbors_face);

    if (faces.size() > 0) {
        // Append the image to a container element on the page
        var container = document.getElementById('image-container');
        container.innerHTML = ''; // Clear previous image (if any)
        container.appendChild(img);
        console.log("Face detected");
        document.getElementById("continue-capture").style.display = "block";
    } else {
        console.log("No face detected");
        document.getElementById("continue-capture").style.display = "none";
    }

    // Release memory
    src.delete();
    gray.delete();
    faces.delete();
}

// Function to draw the oval shape on the canvas
function drawOval() {
    // Clear the canvas
    canvas_oval.getContext('2d').clearRect(0, 0, canvas_oval.width, canvas_oval.height);

    // Get the dimensions of the video element
    var videoWidth = video.offsetWidth;
    var videoHeight = video.offsetHeight;

    // Set the canvas size to match the video element
    canvas_oval.width = videoWidth;
    canvas_oval.height = videoHeight;

    // Calculate the center position of the canvas
    var centerX = Math.floor(canvas_oval.width / 2);
    var centerY = Math.floor(canvas_oval.height / 2);

    // Define the size of the oval shape
    var radiusX = 120;
    var radiusY = 150;

    // Adjust the center position based on the oval size
    var adjustedCenterX = centerX - Math.floor(radiusX / 2);
    var adjustedCenterY = centerY - Math.floor(radiusY / 2);

    // Draw the oval shape on the canvas
    canvas_oval.getContext('2d').beginPath();
    canvas_oval.getContext('2d').ellipse(centerX, centerY, radiusX, radiusY, 0, 0, 2 * Math.PI);
    canvas_oval.getContext('2d').strokeStyle = 'red';
    canvas_oval.getContext('2d').lineWidth = 2;
    canvas_oval.getContext('2d').stroke();

    // Request the next frame
    requestAnimationFrame(drawOval);
}

// Call the drawOval function for the first time
drawOval();

function ReDirect()
{
    window.location.href = "3D_products.php";
}

function onCaptureClick() {
    // Check if OpenCV.js is already loaded
    if (typeof cv === 'undefined') {
        // OpenCV.js is not loaded, so load it dynamically
        var script = document.createElement('script');
        script.src = 'https://docs.opencv.org/master/opencv.js';
        script.onload = function() {
            captureImage();
        };
        document.body.appendChild(script);
    } else {
        // OpenCV.js is already loaded, directly call the captureImage() function
        captureImage();
    }
}