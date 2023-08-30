function onOpenCvScriptLoad() {
    // OpenCV.js script is loaded and ready
    cv.onRuntimeInitialized = function() {
    onOpenCvReady();
    };
}

function onOpenCvReady() {
    let frame_details = {
      'frame_1': [39, "Lenskart Air", 1500 ,"frame_1.png"],
      'frame_2': [42, "John Jacobs", 3200 ,"frame_2.png"],
      'frame_3': [41, "John Jacobs", 4200 ,"frame_3.png"],
      'frame_4': [30, "Vincent Chase", 1599 ,"frame_4.png"]
    };

    let frame_bg = 'assests/3d_try_on_frames/'
    let imgElement = document.getElementById('cap_img');
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

            // // Load the glasses image
            // let glassesImage = new Image();
            // glassesImage.src = frame_bg;
            // glassesImage.onload = function() {
            //     // Calculate the position and size of the glasses overlay
            //     let distanceX = (eye1CenterX + eye2CenterX)/2
            //     let glassesWidth = faceWidth;
            //     let glassesHeight = glassesWidth * (glassesImage.height / glassesImage.width);
            //     let glassesX = distanceX - (glassesWidth / 2);
            //     let glassesY = eye1CenterY - (glassesHeight / 2) - (glassesHeight * 0.0); // Add an offset for y positioning

            //     // Display the glasses overlay on the canvas
            //     canvasOutput.getContext('2d').drawImage(glassesImage, glassesX, glassesY, glassesWidth, glassesHeight);
            // };

            function loadFrameImage(frameId, brandName, productPrice, productImage, eye1CenterX, eye1CenterY, eye2CenterX, faceWidth) {
              let glassesImage = new Image();
              glassesImage.src = frame_bg + productImage;
              glassesImage.onload = function() {
                // Calculate the position and size of the glasses overlay
                let distanceX = (eye1CenterX + eye2CenterX) / 2;
                let glassesWidth = faceWidth;
                let glassesHeight = glassesWidth * (glassesImage.height / glassesImage.width);
                let glassesX = distanceX - (glassesWidth / 2);
                let glassesY = eye1CenterY - (glassesHeight / 2) - (glassesHeight * 0.0); // Add an offset for y positioning
            
                // Get the canvas element
                let canvas = document.getElementById(frameId);
                let context = canvas.getContext('2d');
            
                // Draw the glasses overlay on the canvas
                context.drawImage(glassesImage, glassesX, glassesY, glassesWidth, glassesHeight);
              };
            }
            
            // Call the loadFrameImage function for each frame detail
            for (var key in frame_details) {
              var frame = frame_details[key];
              let Frame_ID = frame[0];
              let Brand_Name = frame[1];
              let Product_Price = frame[2];
              let Product_Image = frame[3];
            
              create_product_box(key, Frame_ID, Brand_Name, Product_Price);
              loadFrameImage(key, Brand_Name, Product_Price, Product_Image, eye1CenterX, eye1CenterY, eye2CenterX, faceWidth);
            }
        }

        // Display the modified image on the canvas
        // cv.imshow(canvasOutput, src);

        for(var key in frame_details)
        {
          cv.imshow(key, src);
          console.log(key,src)
        } 

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

function create_product_box(canvas_id,frame_id,brand_name,product_price)
{
  // Create the parent div element with class "col-md-4"
  var colDiv = document.createElement('div');
  colDiv.classList.add('col-md-4');

  // Create the product box div with class "product_box"
  var productBoxDiv = document.createElement('div');
  productBoxDiv.classList.add('product_box');
  productBoxDiv.classList.add('m-4');

  // Create the button element with class "btns" and other attributes
  var button = document.createElement('button');
  button.classList.add('btns');
  button.setAttribute('name', 'selected_product_from_search');
  button.setAttribute('value', frame_id);
  button.setAttribute('type', 'submit');

  // Create the image container div with class "image-container" and other styles
  var imageContainerDiv = document.createElement('div');
  imageContainerDiv.classList.add('image-container');
  imageContainerDiv.classList.add('d-flex');
  imageContainerDiv.classList.add('justify-content-center');
  imageContainerDiv.classList.add('align-items-center');
  imageContainerDiv.classList.add('p-3');
  imageContainerDiv.style.width = '100%';
  imageContainerDiv.style.height = '18rem';
  imageContainerDiv.style.overflow = 'hidden';

  // Create the canvas element with id "canvasOutput" and class "img-fluid"
  var canvas = document.createElement('canvas');
  canvas.id = canvas_id;
  canvas.classList.add('img-fluid');

  // Append the canvas element to the image container div
  imageContainerDiv.appendChild(canvas);

  // Create the product name div with class "product_name" and text content
  var productNameDiv = document.createElement('div');
  productNameDiv.classList.add('product_name');
  productNameDiv.classList.add('fs-5');
  productNameDiv.classList.add('px-3');
  productNameDiv.classList.add('pb-3');
  productNameDiv.textContent = brand_name;

  // Create the product price div with class "product_price" and text content
  var productPriceDiv = document.createElement('div');
  productPriceDiv.classList.add('product_price');
  productPriceDiv.classList.add('fs-6');
  productPriceDiv.classList.add('px-3');
  productPriceDiv.classList.add('pb-3');
  productPriceDiv.textContent = '₹'+product_price;

  // Append the image container, product name, and product price divs to the button element
  button.appendChild(imageContainerDiv);
  button.appendChild(productNameDiv);
  button.appendChild(productPriceDiv);

  // Append the button element to the product box div
  productBoxDiv.appendChild(button);

  // Append the product box div to the parent col-md-4 div
  colDiv.appendChild(productBoxDiv);

  // Append the col-md-4 div to the desired parent element in the document
  var parentElement = document.getElementById('3d_products');
  parentElement.appendChild(colDiv);
}