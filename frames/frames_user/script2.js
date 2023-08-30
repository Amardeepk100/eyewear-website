var product_type = ["Sunglasses", "Eyeglasses"];
var frametypeContainer = document.getElementById("product_type");

for (var i = 0; i < product_type.length; i++) {
  var div = document.createElement("div");
  div.className = "form-check";

  var input = document.createElement("input");
  input.className = "form-check-input common_selector product_type_filter";
  input.type = "checkbox";
  input.value = product_type[i];
  input.id = product_type[i];

  var label = document.createElement("label");
  label.className = "form-check-label filter_text";
  label.htmlFor = product_type[i];
  label.textContent = product_type[i];

  div.appendChild(input);
  div.appendChild(label);

  frametypeContainer.appendChild(div);
}

var frame_shape = ["Rectangle", "Round", "Square", "Cat Eye", "Wayfarer", "Aviator", "Geometric", "Hexagonal", "Oval", "Clubmaster", "Sports"];
var frameShapeContainer = document.getElementById("frame_shape");

for (var i = 0; i < frame_shape.length; i++) {
  var div = document.createElement("div");
  div.className = "form-check";

  var input = document.createElement("input");
  input.className = "form-check-input common_selector frame_shape_filter";
  input.type = "checkbox";
  input.value = frame_shape[i];
  input.id = frame_shape[i];

  var label = document.createElement("label");
  label.className = "form-check-label filter_text";
  label.htmlFor = frame_shape[i];
  label.textContent = frame_shape[i];

  div.appendChild(input);
  div.appendChild(label);

  frameShapeContainer.appendChild(div);
}

var frame_type = ["Full Rim", "Half Rim", "Rimless"];
var frametypeContainer = document.getElementById("frame_type");

for (var i = 0; i < frame_type.length; i++) {
  var div = document.createElement("div");
  div.className = "form-check";

  var input = document.createElement("input");
  input.className = "form-check-input common_selector frame_type_filter";
  input.type = "checkbox";
  input.value = frame_type[i];
  input.id = frame_type[i];

  var label = document.createElement("label");
  label.className = "form-check-label filter_text";
  label.htmlFor = frame_type[i];
  label.textContent = frame_type[i];

  div.appendChild(input);
  div.appendChild(label);

  frametypeContainer.appendChild(div);
}

var gender = ["Male", "Female"];
var frametypeContainer = document.getElementById("gender");

for (var i = 0; i < gender.length; i++) {
  var div = document.createElement("div");
  div.className = "form-check";

  var input = document.createElement("input");
  input.className = "form-check-input common_selector gender_filter";
  input.type = "checkbox";
  input.value = gender[i];
  input.id = gender[i];

  var label = document.createElement("label");
  label.className = "form-check-label filter_text";
  label.htmlFor = gender[i];
  label.textContent = gender[i];

  div.appendChild(input);
  div.appendChild(label);

  frametypeContainer.appendChild(div);
}

function getSelectedCheckboxes() {
const checkboxes = document.querySelectorAll('input[type="checkbox"]:checked');
const checkedValues = {};

checkboxes.forEach((checkbox) => {
    const key = checkbox.parentElement.parentElement.previousElementSibling.innerText;
    const value = checkbox.value;

    if (!checkedValues.hasOwnProperty(key)) {
    checkedValues[key] = [];
    }

    checkedValues[key].push(value);
});

const selectedFiltersElement = document.getElementById('selected-filters');
selectedFiltersElement.innerHTML = '';

for (const key in checkedValues) {
    if (checkedValues.hasOwnProperty(key)) {
    const values = checkedValues[key].join(' ');
    const filterElement = document.createElement('span');
    filterElement.textContent = ` ${key}: ${values}`;
    selectedFiltersElement.appendChild(filterElement);
    }
}

return checkedValues;
}
  
// Add event listener to checkboxes
const checkboxes = document.querySelectorAll('input[type="checkbox"]');
checkboxes.forEach((checkbox) => {
  checkbox.addEventListener('change', () => {
    getSelectedCheckboxes();
  });
});