function active_dropdown_only(){
let nav_link = document.getElementsByClassName("nav-link")
let tab_pane = document.getElementsByClassName("tab-pane")

for (let i = 0; i<nav_link.length; i++) {
    nav_link[i].addEventListener('click',()=>{removeActive(nav_link[i].id)});
}

function removeActive(clicked) {
    for (let i = 0; i<nav_link.length; i++) {
        if (nav_link[i].id != clicked)
        {
        nav_link[i].classList.remove("active")
        }
    }

    for (let i = 0; i<tab_pane.length; i++) {

        if (tab_pane[i].getAttribute("aria-labelledby") != clicked)
        {
        tab_pane[i].classList.remove("active")
        tab_pane[i].classList.remove("show")
        }
    }
}
}

active_dropdown_only()

function view_all_order()
{
    let nav_link = document.getElementsByClassName("nav-link")

    nav_link[17].click()
}

// edit button for product color
edit_product_color = document.getElementsByClassName('edit_product_color');
Array.from(edit_product_color).forEach((element)=>{
    element.addEventListener("click",(e)=>{
        tr = e.target.parentNode.parentNode.parentNode;
        view_color_id = tr.getElementsByTagName("td")[0].innerText;
        view_color_name = tr.getElementsByTagName("td")[1].innerText;
        view_color_code = tr.getElementsByTagName("td")[2].firstChild.style.backgroundColor;

        view_color_code = view_color_code.match(/\d+/g);
        r = parseInt(view_color_code[0]);
        g = parseInt(view_color_code[1]);
        b = parseInt(view_color_code[2]);
        function rgbToHex(r, g, b) {
            return "#" + ((1 << 24) + (r << 16) + (g << 8) + b).toString(16).slice(1);
        }
        view_color_code = rgbToHex(r, g, b);

        edit_product_color_name.value = view_color_name;
        edit_product_color_code.value = view_color_code;
        edit_product_color_id.value = view_color_id;
    })
})

// delete button for product color
delete_product_color = document.getElementsByClassName('delete_product_color');
Array.from(delete_product_color).forEach((element)=>{
    element.addEventListener("click",(e)=>{

        view_color_id = e.target.id;
        delete_product_color_id.value = view_color_id;

    })
})

// edit button for product material
edit_product_material = document.getElementsByClassName('edit_product_material');
Array.from(edit_product_material).forEach((element)=>{
    element.addEventListener("click",(e)=>{
        tr = e.target.parentNode.parentNode.parentNode;
        console.log(tr)
        view_material_id = tr.getElementsByTagName("td")[0].innerText;
        view_material_name = tr.getElementsByTagName("td")[1].innerText;

        edit_product_material_name.value = view_material_name;
        edit_product_material_id.value = view_material_id;
    })
})

// delete button for product material
delete_product_material = document.getElementsByClassName('delete_product_material');
Array.from(delete_product_material).forEach((element)=>{
    element.addEventListener("click",(e)=>{

        view_material_id = e.target.id;
        delete_product_material_id.value = view_material_id;

    })
})

// edit button for product brand
edit_product_brand = document.getElementsByClassName('edit_product_brand');
Array.from(edit_product_brand).forEach((element)=>{
    element.addEventListener("click",(e)=>{
        tr = e.target.parentNode.parentNode.parentNode;
        console.log(tr)
        view_brand_id = tr.getElementsByTagName("td")[0].innerText;
        view_brand_name = tr.getElementsByTagName("td")[1].innerText;
        view_brand_description = tr.getElementsByTagName("td")[2].innerText;

        edit_product_brand_name.value = view_brand_name;
        edit_product_brand_description.value = view_brand_description;
        edit_product_brand_id.value = view_brand_id;
    })
})

// delete button for product brand
delete_product_brand = document.getElementsByClassName('delete_product_brand');
Array.from(delete_product_brand).forEach((element)=>{
    element.addEventListener("click",(e)=>{

        view_brand_id = e.target.id;
        delete_product_brand_id.value = view_brand_id;

    })
})

// edit button for product
edit_product = document.getElementsByClassName('edit_product');
Array.from(edit_product).forEach((element)=>{
    element.addEventListener("click",(e)=>{
        tr = e.target.parentNode.parentNode.parentNode;
        view_product_id = tr.getElementsByTagName("td")[0].innerText;
        view_brand = tr.getElementsByTagName("td")[1].innerText;
        view_product_type = tr.getElementsByTagName("td")[3].innerText;
        view_gender = tr.getElementsByTagName("td")[5].innerText;
        view_frame_type = tr.getElementsByTagName("td")[6].innerText;
        view_frame_shape = tr.getElementsByTagName("td")[7].innerText;
        view_material = tr.getElementsByTagName("td")[8].innerText;
        view_product_price = tr.getElementsByTagName("td")[9].innerText;
        view_product_description = tr.getElementsByTagName("td")[10].innerText;

        edit_product_id.value = view_product_id;
        edit_brand.value = view_brand;
        edit_product_type.value = view_product_type;
        edit_gender.value = view_gender;
        edit_frame_type.value = view_frame_type;
        edit_frame_shape.value = view_frame_shape;
        edit_material.value = view_material;
        edit_product_price.value = view_product_price;
        edit_product_description.value = view_product_description;
    })
})

// view button for image
view_product_images = document.getElementsByClassName('view_product_images');
Array.from(view_product_images).forEach((element)=>{
    element.addEventListener("click",(e)=>{
        tr = e.target.parentNode.parentNode.parentNode;
        view_image_paths = tr.getElementsByTagName("td")[10].firstElementChild.innerText;
        
        view_image_paths = view_image_paths.replace(/#/g, "%23");
        let imagePathsArray = view_image_paths.split(",");

        view_image_1.src = imagePathsArray[0]+"?v="+Date.now();
        view_image_2.src = imagePathsArray[1]+"?v="+Date.now();
        view_image_3.src = imagePathsArray[2]+"?v="+Date.now();

        view_image_1.value = imagePathsArray[0];
        view_image_2.value = imagePathsArray[1];
        view_image_3.value = imagePathsArray[2];

    })
})

// edit button for image
edit_product_image = document.getElementsByClassName('edit_product_image');
Array.from(edit_product_image).forEach((element)=>{
    element.addEventListener("click",(e)=>{
        loc = e.target.parentElement.parentElement.parentElement.firstElementChild.value;
        loc = loc.replace(/.*\/downhere/, 'downhere');
        loc = loc.replace(/%23/g, '#');

        edit_product_image_location.value = loc;
    })
})

// delete button for product
delete_product = document.getElementsByClassName('delete_product');
Array.from(delete_product).forEach((element)=>{
    element.addEventListener("click",(e)=>{
        
        view_product_id = e.target.id;
        delete_product_id.value = view_product_id;

    })
})

// delete button for user
delete_product = document.getElementsByClassName('delete_user');
Array.from(delete_product).forEach((element)=>{
    element.addEventListener("click",(e)=>{
        
        view_user_email = e.target.id;
        delete_user.value = view_user_email;

    })
})

// delete button for order
delete_product = document.getElementsByClassName('delete_order');
Array.from(delete_product).forEach((element)=>{
    element.addEventListener("click",(e)=>{
        
        view_order = e.target.id;
        delete_order.value = view_order;

    })
})

// update button for order
update_order = document.getElementsByClassName('update_order');
Array.from(update_order).forEach((element)=>{
    element.addEventListener("click",(e)=>{

        tr = e.target.parentNode.parentNode.parentNode;

        view_order_id = tr.getElementsByTagName("td")[0].innerText;
        view_order_payment_status = tr.getElementsByTagName("td")[6].innerText;
        view_order_order_status = tr.getElementsByTagName("td")[7].innerText;

        update_order_id.value = view_order_id;
        update_order_order_status.value = view_order_order_status;
        
        if(view_order_payment_status = "Payment Pending")
        {
            update_order_payment_status.value = 0;
        }
        else if(view_order_payment_status = "Payment Received")
        {
            update_order_payment_status.value = 1;
        }
        
    })
})

// form resubmit solution
if ( window.history.replaceState ) 
{
    window.history.replaceState( null, null, window.location.href );
}

//collapsable 
collapsables =  document.getElementsByClassName("collapsable");
Array.from(collapsables).forEach((element)=>{
    element.addEventListener("click",(e)=>{
        div = e.target.parentElement;

        first_button = div.children[1].children[0].children[0];

        if (div.firstElementChild.classList.contains("collapsed")==false)
        {
            first_button.click()
        }

    })
})