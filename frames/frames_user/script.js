$(document).ready(function() {
    $('.owl-carousel1').owlCarousel({
        loop:true,
        margin:50,
        nav:false,
        dots:false,
        responsive:{
            400:{
                items:1
            },
            800:{
                items:2
            },
            1000:{
                items:3
            },
            1200:{
                items:4
            },
            1600:{
                items:5
            },
            1700:{
                items:6
            }
        }
    })
    
    $('.product_next').click(function() {
        $('.owl-carousel1').trigger('next.owl.carousel',[1000]);
    })
    // Go to the previous item
    $('.product_prev').click(function() {
        $('.owl-carousel1').trigger('prev.owl.carousel',[1000]);
    })

    $('.owl-carousel2').owlCarousel({
        loop:true,
        margin:50,
        nav:false,
        dots:false,
        responsive:{
            400:{
                items:1
            },
            800:{
                items:1
            },
            1000:{
                items:2
            },
            1200:{
                items:2
            },
            1600:{
                items:2
            },
            1700:{
                items:2
            }
        }
    })

    $('.testimonial_next').click(function() {
        $('.owl-carousel2').trigger('next.owl.carousel',[1000]);
    })
    // Go to the previous item
    $('.testimonial_prev').click(function() {
        $('.owl-carousel2').trigger('prev.owl.carousel',[1000]);
    })

    document.getElementById('search').addEventListener('input', function() {
        // Disable smooth scrolling
        document.documentElement.style.scrollPaddingTop = '0px';
    });

});

function glasses_to_search(product_type)
{
    const buttons = document.querySelectorAll('.btns');
    buttons.forEach((button) => {
        button.addEventListener('click', function() {
          const frameShape = button.value;
          const hiddenInput = document.createElement('input');
          hiddenInput.type = 'hidden';
          hiddenInput.name = product_type;
          hiddenInput.value = frameShape;
          this.parentNode.appendChild(hiddenInput);
          
          this.parentNode.submit();
        });
      });
}

glasses_to_search("frame_shape")