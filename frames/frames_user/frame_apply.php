<!DOCTYPE html>
<html lang="en">
<?php 
  include '_dbconnect.php';
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Face Detection with Glasses Overlay</title>
</head>
<body>
  <h2>Face Detection with Glasses Overlay</h2>
  <div>
    <img style="display:none" id="imageSrc" alt="No Image" src="assests/test/5.jpg" />
    <canvas id="canvasOutput"></canvas>
  </div>

  <!-- Replace the local script reference with the CDN link -->
    <script src="https://docs.opencv.org/master/opencv.js" onload="onOpenCvScriptLoad();" async></script>
    <script>
    function onOpenCvScriptLoad() {
        // OpenCV.js script is loaded and ready
        cv.onRuntimeInitialized = function() {
        onOpenCvReady();
        };
    }

    function onOpenCvReady() {
        let frame_bg = 'assests/test/test_frame_4.png'
        let imgElement = document.getElementById('imageSrc');
        let canvasOutput = document.getElementById('canvasOutput');

        let src = cv.imread(imgElement);
        let gray = new cv.Mat();
        let dst = new cv.Mat();

        // Convert image to grayscale
        cv.cvtColor(src, gray, cv.COLOR_BGR2GRAY);

        // Load the haarcascade_frontalface_default.xml and haarcascade_eye.xml files using fetch
        Promise.all([
          fetch('assests/cascades/haarcascade_frontalface_default.xml').then(response => response.text()),
          fetch('assests/cascades/haarcascade_eye.xml').then(response => response.text())
        ])
          .then(responses => {
            // Create virtual files and load the XML data into them
            cv.FS_createDataFile('/', 'haarcascade_frontalface_default.xml', responses[0], true, false, false);
            cv.FS_createDataFile('/', 'haarcascade_eye.xml', responses[1], true, false, false);

            // Load the XML data from the virtual files
            let faceCascade = new cv.CascadeClassifier();
            faceCascade.load('haarcascade_frontalface_default.xml');

            let eyeCascade = new cv.CascadeClassifier();
            eyeCascade.load('haarcascade_eye.xml');

            // Parameters for face detection
            let scaleFactor_face = 1.1; // Adjust this value to control sensitivity
            let minNeighbors_face = 5; // Adjust this value to control the number of neighboring rectangles

            let scaleFactor_eyes = 1.3; // Adjust this value to control sensitivity
            let minNeighbors_eyes = 5; // Adjust this value to control the number of neighboring rectangles

            let faces = new cv.RectVector();
            faceCascade.detectMultiScale(gray, faces, scaleFactor_face, minNeighbors_face);

            let eyes = new cv.RectVector();
            eyeCascade.detectMultiScale(gray, eyes, scaleFactor_eyes, minNeighbors_eyes);

            // Draw markers on the faces
            if (faces.size() > 0 && eyes.size() > 0) {
                let face = faces.get(0); // Get the first detected face
                let faceWidth = face.width;

                let eye1 = eyes.get(0); // Get the first detected eye
                let eye1CenterX = eye1.x + eye1.width / 2;
                let eye1CenterY = eye1.y + eye1.height / 2;

                let eye2 = eyes.get(1);
                let eye2CenterX = eye2.x + eye2.width / 2;
                let eye2CenterY = eye2.y + eye2.height / 2;

                // Load the glasses image
                let glassesImage = new Image();
                glassesImage.src = frame_bg;
                glassesImage.onload = function() {
                    // Calculate the position and size of the glasses overlay
                    let distanceX = (eye1CenterX + eye2CenterX)/2
                    let glassesWidth = faceWidth;
                    let glassesHeight = glassesWidth * (glassesImage.height / glassesImage.width);
                    let glassesX = distanceX - (glassesWidth / 2);
                    let glassesY = eye1CenterY - (glassesHeight / 2) - (glassesHeight * 0.0); // Add an offset for y positioning

                    // Display the glasses overlay on the canvas
                    canvasOutput.getContext('2d').drawImage(glassesImage, glassesX, glassesY, glassesWidth, glassesHeight);
                };
            }

            // Display the modified image on the canvas
            cv.imshow(canvasOutput, src);

            // Release memory
            src.delete();
            gray.delete();
            dst.delete();
            faces.delete();
            faceCascade.delete();
            eyes.delete();
            eyeCascade.delete();

            console.log("Face detection with glasses overlay complete!");
          })
          .catch(error => {
            console.error("Error loading XML files:", error);
        });
    }
    </script>
</body>
</html>
