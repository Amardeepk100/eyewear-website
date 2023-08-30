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
    <img style="display:none" id="imageSrc" alt="No Image" src="assests/test/1.jpg" />
    <canvas id="canvasOutput"></canvas>
  </div>

  <button id="prevFrameBtn">Previous Frame</button>
  <button id="nextFrameBtn">Next Frame</button>
  <button id="prevImgBtn">Previous Image</button>
  <button id="nextImgBtn">Next Image</button>

  <script src="https://docs.opencv.org/master/opencv.js" onload="onOpenCvScriptLoad();" async></script>
  <script>
    let frameIndex = 1; // Initial frame index
    let imgIndex = 1; // Initial image index
    let faceCascade = null;
    let eyeCascade = null;

    function onOpenCvScriptLoad() {
      cv.onRuntimeInitialized = function() {
        loadCascadeFiles()
          .then(() => loadFrame());
      };
    }

    function loadCascadeFiles() {
      return Promise.all([
        fetch('assests/cascades/haarcascade_frontalface_default.xml').then(response => response.text()),
        fetch('assests/cascades/haarcascade_eye.xml').then(response => response.text())
      ])
        .then(responses => {
          cv.FS_createDataFile('/', 'haarcascade_frontalface_default.xml', responses[0], true, false, false);
          cv.FS_createDataFile('/', 'haarcascade_eye.xml', responses[1], true, false, false);

          faceCascade = new cv.CascadeClassifier();
          faceCascade.load('haarcascade_frontalface_default.xml');

          eyeCascade = new cv.CascadeClassifier();
          eyeCascade.load('haarcascade_eye.xml');

          console.log("Cascade files loaded successfully!");
        })
        .catch(error => {
          console.error("Error loading XML files:", error);
        });
    }

    function loadFrame() {
      let frame_bg = `assests/test/test_frame_${frameIndex}.png`;

      let imgElement = document.getElementById('imageSrc');
      imgElement.src = `assests/test/${imgIndex}.jpg`;

      let canvasOutput = document.getElementById('canvasOutput');

      let src = cv.imread(imgElement);
      let gray = new cv.Mat();
      let dst = new cv.Mat();

      cv.cvtColor(src, gray, cv.COLOR_BGR2GRAY);

      if (faceCascade && eyeCascade) {
        let scaleFactor_face = 1.1;
        let minNeighbors_face = 5;

        let scaleFactor_eyes = 1.3;
        let minNeighbors_eyes = 5;

        let faces = new cv.RectVector();
        faceCascade.detectMultiScale(gray, faces, scaleFactor_face, minNeighbors_face);

        let eyes = new cv.RectVector();
        eyeCascade.detectMultiScale(gray, eyes, scaleFactor_eyes, minNeighbors_eyes);

        if (faces.size() > 0 && eyes.size() > 0) {
          let face = faces.get(0);
          let faceWidth = face.width;

          let eye1 = eyes.get(0);
          let eye1CenterX = eye1.x + eye1.width / 2;
          let eye1CenterY = eye1.y + eye1.height / 2;

          let eye2 = eyes.get(1);
          let eye2CenterX = eye2.x + eye2.width / 2;
          let eye2CenterY = eye2.y + eye2.height / 2;

          let glassesImage = new Image();
          glassesImage.src = frame_bg;
          glassesImage.onload = function() {
            let distanceX = (eye1CenterX + eye2CenterX) / 2;
            let glassesWidth = faceWidth;
            let glassesHeight = glassesWidth * (glassesImage.height / glassesImage.width);
            let glassesX = distanceX - (glassesWidth / 2);
            let glassesY = eye1CenterY - (glassesHeight / 2) - (glassesHeight * 0.0);

            canvasOutput.getContext('2d').drawImage(glassesImage, glassesX, glassesY, glassesWidth, glassesHeight);
          };
        }
      }

      cv.imshow(canvasOutput, src);

      src.delete();
      gray.delete();
      dst.delete();
      faces.delete();
      eyes.delete();

      console.log("Face detection with glasses overlay complete!");
    }

    function updateFrame(direction) {
      frameIndex += direction;
      loadFrame();
    }

    function updateImage(direction) {
      imgIndex += direction;
      loadFrame();
    }

    document.getElementById('prevFrameBtn').addEventListener('click', function() {
      updateFrame(-1);
    });

    document.getElementById('nextFrameBtn').addEventListener('click', function() {
      updateFrame(1);
    });

    document.getElementById('prevImgBtn').addEventListener('click', function() {
      updateImage(-1);
    });

    document.getElementById('nextImgBtn').addEventListener('click', function() {
      updateImage(1);
    });
  </script>
</body>
</html>
