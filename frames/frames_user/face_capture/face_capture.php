<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Webcam Capture</title>
    <style>
        #video {
            position: absolute;
            left: 0;
            top: 0;
            z-index: 1;
        }

        #canvas {
            position: absolute;
            left: 0;
            top: 0;
            z-index: 2;
        }

        #capture-btn {
            position: absolute;
            left: 50%;
            bottom: 20px;
            transform: translateX(-50%);
            z-index: 3;
        }

        #image-container {
            position: absolute;
            right: 0%;
            transform: translateX(-50%);
            z-index: 3;
        }
    </style>
</head>
<body>
    <video id="video" autoplay></video>
    <canvas id="canvas"></canvas>
    <div id="image-container"></div>
    <button id="capture-btn" onclick="onCaptureClick()">Capture Image</button>

    <script src="https://docs.opencv.org/master/opencv.js" async></script>
    <script>
        // Get the video and canvas elements from the HTML document
        var video = document.getElementById('video');
        var canvas = document.getElementById('canvas');

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
                        canvas.width = video.videoWidth;
                        canvas.height = video.videoHeight;
                    });
                })
                .catch(function(error) {
                    console.error("Unable to access the webcam: " + error);
                });
        }
        // Function to capture an image from the webcam and perform face detection
        function captureImage() {
            console.log("captureImage() started");
            // Draw the current frame from the video onto the canvas
            canvas.getContext('2d').drawImage(video, 0, 0, canvas.width, canvas.height);

            // Convert the canvas image to a data URL
            var dataURL = canvas.toDataURL();

            var img = document.createElement('img');
            img.src = dataURL;
            img.id = "webcapture";

            img.onload = function() {
                let src = cv.imread(img);
                let gray = new cv.Mat();

                cv.cvtColor(src, gray, cv.COLOR_BGR2GRAY);

                fetch('../assests/cascades/haarcascade_frontalface_default.xml')
                    .then(response => response.text())
                    .then(data => {
                        cv.FS_createDataFile('/', 'haarcascade_frontalface_default.xml', data, true, false, false);

                        let faceCascade = new cv.CascadeClassifier();
                        faceCascade.load('haarcascade_frontalface_default.xml');

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
                        } else {
                            console.log("No face detected");
                        }

                        // Release memory
                        src.delete();
                        gray.delete();
                        faces.delete();
                        faceCascade.delete();
                    })
                    .catch(error => {
                        console.error("Error loading XML file:", error);
                    });
            };
        }


        function onCaptureClick() {
            // Check if OpenCV.js is already loaded
            if (typeof cv === 'undefined') {
                // OpenCV.js is not loaded, so load it dynamically
                var script = document.createElement('script');
                script.src = 'https://docs.opencv.org/master/opencv.js';
                script.onload = function() {
                    onOpenCvScriptLoad();
                    captureImage();
                };
                document.body.appendChild(script);
            } else {
                // OpenCV.js is already loaded, directly call the captureImage() function
                captureImage();
            }
        }
    </script>
</body>
</html>
