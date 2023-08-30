<!DOCTYPE html>
<html lang="en">
<?php 
  include '_dbconnect.php';
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eye Detection with Markers</title>
</head>
<body>
  <h2>Eye Detection with Markers</h2>
  <div>
    <img style="display:none" id="imageSrc" alt="No Image" src="assests/test/1.jpg" />
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
        let imgElement = document.getElementById('imageSrc');
        let canvasOutput = document.getElementById('canvasOutput');

        let src = cv.imread(imgElement);
        let gray = new cv.Mat();
        let dst = new cv.Mat();

        // Convert image to grayscale
        cv.cvtColor(src, gray, cv.COLOR_BGR2GRAY);

        // Load the haarcascade_eye_tree_eyeglasses.xml file using fetch
        fetch('assests/cascades/haarcascade_eye.xml')
          .then(response => response.text())
          .then(data => {
            // Create a virtual file and load the XML data into it
            cv.FS_createDataFile('/', 'haarcascade_eye.xml', data, true, false, false);

            // Load the XML data from the virtual file
            // Load the XML data from the virtual file
            let eyeCascade = new cv.CascadeClassifier();
            eyeCascade.load('haarcascade_eye.xml');

            // Parameters for eye detection
            let scaleFactor = 1.3; // Adjust this value to control sensitivity
            let minNeighbors = 5; // Adjust this value to control the number of neighboring rectangles

            let eyes = new cv.RectVector();
            eyeCascade.detectMultiScale(gray, eyes, scaleFactor, minNeighbors);

            // Draw markers on the eyes
            if (eyes.size() > 0) {
            // Draw markers on the eyes
                for (let i = 0; i < Math.min(2, eyes.size()); ++i) {
                    let eye = eyes.get(i);
                    let point1 = new cv.Point(eye.x, eye.y);
                    let point2 = new cv.Point(eye.x + eye.width, eye.y + eye.height);
                    cv.rectangle(src, point1, point2, [0, 255, 0, 255]);

                    let eyeCenterX = eye.x + eye.width / 2;
                    let eyeCenterY = eye.y + eye.height / 2;

                    // Draw a red dot at the eye position
                    let dotRadius = 2;
                    cv.circle(src, new cv.Point(eyeCenterX, eyeCenterY), dotRadius, [0, 0, 255, 255], -1);
                }
            }


            // Display the modified image on the canvas
            cv.imshow(canvasOutput, src);

            // Release memory
            src.delete();
            gray.delete();
            dst.delete();
            eyes.delete();
            eyeCascade.delete();

            console.log("Eye detection with markers complete!");
          })
          .catch(error => {
            console.error("Error loading XML file:", error);
          });
    }
    </script>
</body>
</html>
