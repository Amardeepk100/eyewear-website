function clearCart() {
  localStorage.removeItem('cart');
  alert('Cart cleared!');
  handleCartChange()
}

// Retrieve the cart items from local storage
var cartItems = JSON.parse(localStorage.getItem('cart')) || {};
// Iterate over the cart items
for (var productId in cartItems) {
  if (cartItems.hasOwnProperty(productId)) {
    var cartItem = cartItems[productId];

    // Create the <tr> element
    var tr = document.createElement('tr');

    // Create the first <td> element
    var td1 = document.createElement('td');

    // Create the outer <div> element with class "d-flex"
    var outerDiv = document.createElement('div');
    outerDiv.className = 'd-flex';
    outerDiv.style.width = '100%';
    outerDiv.style.height = '100%';

    // Create the first inner <div> element with class "d-flex p-1"
    var innerDiv1 = document.createElement('div');
    innerDiv1.className = 'd-flex p-1';
    innerDiv1.style.height = '100px';
    innerDiv1.style.width = '100px';
    innerDiv1.style.overflow = 'hidden';

    // Create the <img> element
    var img = document.createElement('img');
    img.className = 'align-self-center';
    img.src = cartItem.image;
    img.style.maxWidth = '100%';
    img.style.maxHeight = '100%';
    img.style.objectFit = 'contain';

    // Append the <img> element to innerDiv1
    innerDiv1.appendChild(img);

    // Create the second inner <div> element with class "d-flex flex-column justify-content-center p-2"
    var innerDiv2 = document.createElement('div');
    innerDiv2.className = 'd-flex flex-column justify-content-center p-2';

    // Create the first inner <div> inside innerDiv2 for brand name
    var innerDiv2Div1 = document.createElement('div');
    innerDiv2Div1.className = 'p-1';
    innerDiv2Div1.style.fontSize = '16px';
    innerDiv2Div1.style.color = '#333';
    innerDiv2Div1.textContent = cartItem.brandName;

    // Create the second inner <div> inside innerDiv2 for price
    var innerDiv2Div2 = document.createElement('div');
    innerDiv2Div2.className = 'p-1';
    innerDiv2Div2.style.fontSize = '18px';
    innerDiv2Div2.style.color = '#151515';
    innerDiv2Div2.style.fontWeight = '600';
    innerDiv2Div2.textContent = '₹' + cartItem.price;

    // Create the third inner <div> inside innerDiv2 for "Remove"
    var innerDiv2Div3 = document.createElement('div');
    innerDiv2Div3.className = 'p-1';
    innerDiv2Div3.style.fontSize = '14px';
    innerDiv2Div3.style.color = '#333';
    innerDiv2Div3.style.fontWeight = '500';

    // Create the button for "Remove" with class "btns"
    var removeButton = document.createElement('button');
    removeButton.className = 'btns';
    removeButton.style.fontSize = '14px';
    removeButton.style.color = '#333';
    removeButton.style.fontWeight = '500';

    // Create the <i> element for "x" inside the remove button
    var removeIcon = document.createElement('i');
    removeIcon.className = 'pb-1';
    removeIcon.setAttribute('data-feather', 'x');

    var textNode = document.createTextNode(" Remove");

    // Add onclick event handler to remove the item from cart
    removeButton.onclick = (function(productId,tr) {
      return function() {
        // Remove the item from cart
        delete cartItems[productId];
        localStorage.setItem('cart', JSON.stringify(cartItems));

        // Remove the corresponding table row from the DOM
        tr.parentNode.removeChild(tr);

        update_total_cost()
        handleCartChange();
      };
    })(productId,tr);

    // Append the remove icon to the remove button
    removeButton.appendChild(removeIcon);
    removeButton.appendChild(textNode);

    // Append the remove button to innerDiv2Div3
    innerDiv2Div3.appendChild(removeButton);

    // Append the inner <div> elements to innerDiv2
    innerDiv2.appendChild(innerDiv2Div1);
    innerDiv2.appendChild(innerDiv2Div2);
    innerDiv2.appendChild(innerDiv2Div3);

    // Append the inner <div> elements to the outer <div>
    outerDiv.appendChild(innerDiv1);
    outerDiv.appendChild(innerDiv2);

    // Append the outer <div> to the first <td> element
    td1.appendChild(outerDiv);

    // Create the second <td> element
    var td2 = document.createElement('td');
    td2.className = 'align-middle';

    // Create the <div> element for quantity with class "d-flex justify-content-center flex-row"
    var quantityDiv = document.createElement('div');
    quantityDiv.className = 'd-flex justify-content-center flex-row';

    var leftButton = document.createElement('button');
    leftButton.className = 'btns';

    var rightButton = document.createElement('button');
    rightButton.className = 'btns';

    var quantityText = document.createElement('span');
    quantityText.id = 'quantity-' + productId; // Add product ID as the id attribute's value
    quantityText.textContent = cartItem.quantity;

    var leftIcon = document.createElement('i');
    leftIcon.className = 'pb-1';
    leftIcon.setAttribute('data-feather', 'chevron-left');

    var rightIcon = document.createElement('i');
    rightIcon.className = 'pb-1';
    rightIcon.setAttribute('data-feather', 'chevron-right');

    quantityDiv.appendChild(leftButton)
    leftButton.appendChild(leftIcon)

    quantityDiv.appendChild(quantityText)

    quantityDiv.appendChild(rightButton)
    rightButton.appendChild(rightIcon)

    // Append the quantity <div> to the second <td> element
    td2.appendChild(quantityDiv);

    // Create the third <td> element
    var td3 = document.createElement('td');
    td3.className = 'align-middle';

    // Create the <div> element for amount with class "d-flex justify-content-center"
    var amountDiv = document.createElement('div');
    amountDiv.className = 'd-flex justify-content-center total_cost';
    amountDiv.id = 'amount-' + productId; // Add product ID as the id attribute's value
    amountDiv.textContent = '₹' + (cartItem.price * cartItem.quantity);

    // Append the amount <div> to the third <td> element
    td3.appendChild(amountDiv);

    // Append the <td> elements to the <tr> element
    tr.appendChild(td1);
    tr.appendChild(td2);
    tr.appendChild(td3);

    // Append the <tr> element to the table body with id "cart-items"
    document.getElementById('cart-items').appendChild(tr);

    // Add event listeners to the buttons
    leftButton.addEventListener('click', (function(productId, cartItem, quantityText, amountDiv) {
      return function() {
        if (cartItem.quantity > 1) {
          cartItem.quantity--;
          quantityText.textContent = cartItem.quantity;
          amountDiv.textContent = '₹' + (cartItem.price * cartItem.quantity);
          localStorage.setItem('cart', JSON.stringify(cartItems));
          update_total_cost()
        }
      };
    })(productId, cartItem, quantityText, amountDiv));

    rightButton.addEventListener('click', (function(productId, cartItem, quantityText, amountDiv) {
      return function() {
        if (cartItem.quantity < 3) {
          cartItem.quantity++;
          quantityText.textContent = cartItem.quantity;
          amountDiv.textContent = '₹' + (cartItem.price * cartItem.quantity);
          localStorage.setItem('cart', JSON.stringify(cartItems));
          update_total_cost()
        }
      };
    })(productId, cartItem, quantityText, amountDiv));
  }
  update_total_cost()
  handleCartChange();
}

function update_total_cost()
{
  var totalSum = 0;
  var totalCostElements = document.getElementsByClassName('total_cost');

  for (var i = 0; i < totalCostElements.length; i++) {
    var costText = totalCostElements[i].textContent;
    var costValue = parseInt(costText.replace('₹', ''));
    totalSum += costValue;
  }

  var total_amount_dom = document.getElementById('total_cost');
  var total_payable_dom = document.getElementById('total_payable');

  total_amount_dom.textContent = '₹' + totalSum;
  total_payable_dom.textContent = '₹' + (parseInt(totalSum) + 100);
}


function handleCartChange() {
  var cart_product_container = document.getElementById("cart_product_container");
  var cart_product_details = document.getElementById("cart_product_details");
  var cart_product_amount_details = document.getElementById("cart_product_amount_details");
  var cart_no_product = document.getElementById("cart_no_product");

  // Check if the local storage cart value is empty
  var cartItems = JSON.parse(localStorage.getItem('cart')) || {};
  if (Object.keys(cartItems).length === 0) {
    cart_product_details.style.display = "none";
    cart_product_amount_details.style.display = "none";
    cart_product_container.classList.add("align-items-center");
    cart_product_container.classList.add("cart_product_container2");
    cart_no_product.style.display = "flex";
    return "dove";
  }
  else {
    cart_no_product.style.display = "none";
    cart_product_details.style.display = "block";
    cart_product_amount_details.style.display = "block";
    cart_product_container.classList.remove("align-item-center");
    cart_product_container.classList.remove("cart_product_container2");
    return "done";
  }
}

handleCartChange()