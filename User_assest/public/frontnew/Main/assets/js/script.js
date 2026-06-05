$(document).ready(function() {
    const textes = $(".animate-text span");
    const textCounts = textes.length;
    let indexs = 0;
    const textInTimers = 3000;
    const textOutTimers = 2800;

    function animateTexts() {
        textes.removeClass("text-ins text-outs");
        textes.eq(indexs).addClass("text-ins");
        setTimeout(function() {
            textes.eq(indexs).addClass("text-outs");
        }, textOutTimers);

        setTimeout(function() {
            indexs = (indexs + 1) % textCounts;
            animateTexts();
        }, textInTimers);
    }

    animateTexts();
});
 




$('.counter').each(function () {
        $(this).prop('Counter',0).animate({
            Counter: $(this).text()
        }, {
          
          //chnage count up speed here
            duration: 4000,
            easing: 'swing',
            step: function (now) {
                $(this).text(Math.ceil(now));
            }
        });
    });




// document.addEventListener('DOMContentLoaded', function() {
//     var scrollMagicController = new ScrollMagic.Controller();

//     var tween = gsap.fromTo('#custom-animation', {

//         scale: 1, // Start scale
//         rotation: 0 // Start rotation
//     }, {

//         scale: 2, // End scale
//         rotation: 180, // End rotation
//         duration: 1 // Animation duration in seconds
//     });

//     var scene = new ScrollMagic.Scene({
//             triggerElement: '#custom-trigger',
//             offset: 150 /* offset the trigger 150px below #custom-trigger's top */
//         })
//         .setTween(tween)
//         .addTo(scrollMagicController);

//     scene.addIndicators();
// });


//mobile menu start to here
$(document).ready(function() {

    $('.hamburger').click(() => {
        $('body').toggleClass('overflow-hidden');
        $('.menu').toggleClass('nav-open');
        $('.hamburger').toggleClass('nav-open');
        
        // if ($('.menu').hasClass('nav-open')) {
        //     $('#sports, #sports-sub').addClass('active');

        // } else {
        //     $('.active').removeClass('active');

        // }
    });
});



$('.nav-link').on('click', function() {
    
    $(".menu").removeClass('nav-open');
    $(".hamburger").removeClass('nav-open');
    $('body').removeClass('overflow-hidden');
});



//past perfomance slick slider

$('.past-wrap').slick({
    dots: true,
    infinite: false,
    arrows: true,
    dots: false,
    centerPadding: "77px",
    autoplay: false,
    pauseOnHover: false,
    pauseOnFocus: false,
    autoplaySpeed: 5000,
    speed: 500,
    slidesToShow: 4,
    slidesToScroll: 1,
    prevArrow: "<button type='button' class='slick-prev pull-left'><img src='assets/images/past-left-arrow.png' alt='past-left-arrow'></button>",
    nextArrow: "<button type='button' class='slick-next pull-right'><img src='assets/images/past-right-arrow.png' alt='past-right-arrow'></button>",
    responsive: [{
        breakpoint: 1024,
        settings: {
            slidesToShow: 3,
            slidesToScroll: 1,
        }
    }, {
        breakpoint: 600,
        settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
        }
    }, {
        breakpoint: 480,
        settings: {
            slidesToShow: 1,
            slidesToScroll: 1,

        }
    }]
});



$('.testi_wrap').slick({
    centerPadding: '0',
    dots: false,
    infinite:false,
    arrows: true,
    // autoplay: true,
    autoplaySpeed: 5000, 
    speed: 500, 
    slidesToShow: 3, 
    centerMode: true,
    centeredSlides: true,
  initialSlide: 1,
    prevArrow: "<button type='button' class='slick-prev pull-left'><img src='assets/images/feedback/left-arrow.png' alt='left-arrow'></button>",
    nextArrow: "<button type='button' class='slick-next pull-right'><img src='assets/images/feedback/right-arrow.png' alt='right-arrow'></button>",
    responsive: [{
        breakpoint: 1024,
        settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            centerMode: false,
            centerMode: false,
        }
    }, {
        breakpoint: 600,
        settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            centerMode: false,
        }
    }, {
        breakpoint: 480,
        settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            centerMode: false,
        }
    }]
});





// feature section bottom slider 
$('.feat-warp').slick({
    centerPadding: '0',
    dots: false,
    infinite: true,
    arrows: true,
    autoplay: true,  
    slidesToShow: 3,
    slidesToScroll: 1,
    centerMode: true,
    responsive: [{
        breakpoint: 1024,
        settings: {
            slidesToShow: 2,
            slidesToScroll: 1,
            centerMode: false,
            centerMode: false,
        }
    }, {
        breakpoint: 600,
        settings: {
            slidesToShow: 2,
            slidesToScroll: 1,
            centerMode: false,
        }
    }, {
        breakpoint: 480,
        settings: {
            slidesToShow: 2,
            slidesToScroll: 1,
            centerMode: false,
        }
    }]
});


// feature section bottom slider 
$('.core-feat-sld').slick({
    centerPadding: '0',
    dots: false,
    infinite: true,
    arrows: true,
    autoplay: true,
    autoplaySpeed: 5000,
    speed: 500,
    cssEase: 'linear',
    slidesToShow: 3,
    slidesToScroll: 1,
    centerMode: false,
    responsive: [{
        breakpoint: 1500,
        settings: {
            slidesToShow: 3,
            slidesToScroll: 1,
            centerMode: false,
            centerMode: false,
        }
    },{
        breakpoint: 1024,
        settings: {
            slidesToShow: 3,
            slidesToScroll: 1,
            centerMode: false,
            centerMode: false,
        }
    }, {
        breakpoint: 767,
        settings: {
            slidesToShow: 2,
            slidesToScroll: 1,
            centerMode: false,
        }
    }, {
        breakpoint: 567,
        settings: {
            slidesToShow: 2,
            slidesToScroll:2,
            centerMode: false,
        }
    }]
});





//mobile screen slider
// $('.phone-slider-').slick({
//     // dots: true,
//     // centerPadding: '0px',
//     // infinite: true,
//     // arrows: true,
//     // autoplay: true,
//     // autoplaySpeed: 5000,
//     // speed: 500,
//     // slidesToShow: 1,
//     // slidesToScroll: 1,
//     dots: true,
//     infinite: true,
//     arrows: true,
//     centerMode:false,
//     centerPadding: "0px",
//     autoplay: true,
//     pauseOnHover: false,
//     pauseOnFocus: false,
//     autoplaySpeed: 4000,
//     speed: 400,
//     slidesToShow: 1,
//     slidesToScroll: 1,
//      cssEase: 'linear',
    
//     responsive: [{
//         breakpoint: 1024,
//         settings: {
//             slidesToShow: 1,
//             slidesToScroll: 1,
//         }
//     }, {
//         breakpoint: 600,
//         settings: {
//             slidesToShow: 1,
//             slidesToScroll: 1,
//         }
//     }, {
//         breakpoint: 480,
//         settings: {
//             slidesToShow: 1,
//             slidesToScroll: 1,

//         }
//     }]
    
// });

$('.feat-sec-silder').slick({
    dots: true,
    centerPadding: '0',
    infinite: false,
    loop:true,
    arrows: false,
    autoplay: true,
    autoplaySpeed: 5000,
    speed: 500,    
    slidesToShow: 1,
    slidesToScroll: 1,
    accesibility:true,
    draggable: true,
    swipe: true,
    touchMove: true,
}); 



$(document).ready(function() {
    // Function to add 'active' class to the appropriate line and 'blow-fill' class to the row
    function setActiveLine() {
        var currentScroll = $(window).scrollTop();
       $('.row-wrap > .row').each(function() {
            var rowOffset = $(this).offset().top; 
            if (currentScroll >= rowOffset - 450) {
                $('.line').removeClass('active');
                $(this).find('.line').addClass('active');
                $('.row-wrap > .row').removeClass('blow-fill'); // Remove 'blow-fill' class from all rows
                $(this).addClass('blow-fill'); // Add 'blow-fill' class to the current row
            }
        });
    }

    // Call the setActiveLine function on scroll
    $(window).on('scroll', function() {
        // Call setActiveLine function 
        setActiveLine();

    });

    // Smooth scroll to next row
    $('.line').on('click', function() {
        var index = $('.line').index(this);
        var nextRowOffset = $('.row-wrap >').eq(index + 1).offset().top;
        $('html, body').animate({
            scrollTop: nextRowOffset
        }, 800); // Adjust the duration as needed
    });

    // Add 'active' class to the first line by default
    $('.line').first().addClass('active');
    $(".row-wrap > .row").first().addClass('blow-fill');
});





 

$('.slider-for').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  arrows: false,
  // fade: true,
  asNavFor: '.slider-nav'
});
$('.slider-navs').slick({
  slidesToShow: 4,
  slidesToScroll: 1,
  asNavFor: '.slider-for',
  dots: true, 
  focusOnSelect: true,
  prevArrow: "<button type='button' class='slick-prev pull-left'><img src='assets/images/icon/custm-arrow-left.svg' alt='custm-arrow-left'></button>",
  nextArrow: "<button type='button' class='slick-next pull-right'><img src='assets/images/icon/custm-arrow-right.svg' alt='custm-arrow-right'></button>",
});



// why-chos-wrap  slider 
// mobileOnlySlider(".why-chos-wrap", true, false, 767);

// function mobileOnlySlider($slidername, $dots, $arrows, $breakpoint) {

//     var slider = $($slidername);
//     var settings = {

//         mobileFirst: true,
//         infinite:false,
//         dots: $dots,
//         variableWidth:true,
//         autoplay: false,
//         autoplaySpeed: 5000,
//         speed: 500,
//         cssEase: 'linear',
//         arrows: $arrows,
//         responsive: [{
//             breakpoint: $breakpoint,
//             settings: "unslick"
//         }]
//     };

//     slider.slick(settings);

//     $(window).on("resize", function() {
//         if ($(window).width() > $breakpoint) {
//             return;
//         }
//         if (!slider.hasClass("slick-initialized")) {
//             return slider.slick(settings);
//         }
//     });
// } 







// responsive slider 
mobileOnlySlider(".mySlider", true, false, 767);

function mobileOnlySlider($slidername, $dots, $arrows, $breakpoint) {
    var slider = $($slidername);
    var settings = {
        mobileFirst: true,
        dots: $dots,
        autoplay: true,
        autoplaySpeed: 5000,
        speed: 500,
        cssEase: 'linear',
        arrows: $arrows,
        responsive: [{
            breakpoint: $breakpoint,
            settings: "unslick"
        }]
    };

    slider.slick(settings);

    $(window).on("resize", function() {
        if ($(window).width() > $breakpoint) {
            return;
        }
        if (!slider.hasClass("slick-initialized")) {
            return slider.slick(settings);
        }
    });
} // Mobile Only Slider



// responsive slider 
mobileOnlySlider(".join-box-wrp", true, false, 991);

function mobileOnlySlider($slidername, $dots, $arrows, $breakpoint) {
    var slider = $($slidername);
    var settings = {
        mobileFirst: true,
        dots: $dots,
        autoplay: true, 
        speed:500, 
        arrows: $arrows,
        responsive: [{
            breakpoint: $breakpoint,
            settings: "unslick"
        }]
    };

    slider.slick(settings);

    $(window).on("resize", function() {
        if ($(window).width() > $breakpoint) {
            return;
        }
        if (!slider.hasClass("slick-initialized")) {
            return slider.slick(settings);
        }
    });
} // Mobile Only Slider



//scroll header fixed
$(document).ready(function() {
    $(window).scroll(function() {
        $val = $(window).scrollTop();
        if ($val > 150) {
            $('.header_sec').css({
                position: 'sticky',
                top: 0,
                left: 0,
                zIndex :1000000,
                boxShadow:"rgb(255 255 255 / 7%) 0px 0px 15px 5px", 
            })
        } else {
            $('.header_sec').css({
                position: 'relative',
                 boxShadow:'unset',
            })
        }
    })
}) 




///
 $(".step1").on("click", function() {
    $(".step2").removeClass("active");
    $(".step3").removeClass("active");
    $(".step4").removeClass("active");
    $(this).addClass("active");
    $(".left-box1").show();
    $(".left-box4").hide();
    $(".left-box2").hide();
    $(".left-box3").hide();
 });

  $(".step2").on("click", function() {
    $(".step1").removeClass("active");
    $(".step3").removeClass("active");
    $(".step4").removeClass("active");
    $(this).addClass("active");
    $(".left-box2").show();
    $(".left-box4").hide();
    $(".left-box1").hide();
    $(".left-box3").hide();
 });


  $(".step3").on("click", function() {
    $(".step1").removeClass("active");
    $(".step2").removeClass("active");
    $(".step4").removeClass("active");
    $(this).addClass("active");
    $(".left-box3").show();
    $(".left-box4").hide();
    $(".left-box1").hide();
    $(".left-box2").hide();
 });


  $(".step4").on("click", function() {
    $(".step3").removeClass("active");
    $(".step2").removeClass("active");
    $(".step1").removeClass("active");
    $(this).addClass("active");
    $(".left-box4").show();
    $(".left-box3").hide();
    $(".left-box1").hide();
    $(".left-box2").hide();
 });








 $('.comm-wrap').slick({ 
    dots: false,
    infinite: false,
    arrows: true,
    autoplay: false,
    autoplaySpeed: 3000,
    speed: 500,     
    slidesToShow: 3,
    slidesToScroll: 3,
    centerMode: false,
            variableWidth:true,
     prevArrow: "<button type='button' class='slick-prev pull-left'><img src='./assets/images/icon/left_arrow.png' alt='left_arrow'></button>",
  nextArrow: "<button type='button' class='slick-next pull-right'><img src='./assets/images/icon/right_arrow.png' alt='right_arrow'></button>",
    responsive: [{
        breakpoint: 1600,
        settings: {
            variableWidth:true,
            slidesToShow:2,
            slidesToScroll:1,       
        }
    },{
        breakpoint: 992,
        settings: {
            slidesToShow: 2,
            slidesToScroll: 1,
            centerMode: false,
            centerMode: false,
            dots: true,
        }
    }, {
        breakpoint: 600,
        settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            centerMode: false,
            dots: true,
            variableWidth:false,
        }
    }, {
        breakpoint: 480,
        settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            centerMode: false,
            dots: true,
            variableWidth:false,
        }
    }]
});


//AOS animation disble
 AOS.init({
  disable: function() {
    var maxWidth = 992;
    return window.innerWidth < maxWidth;
  }
});


 
    jQuery(document).ready(function($) {
  $('.slick.marquee').slick({
    speed: 8000,
    autoplay: true,
    autoplaySpeed: 0,
    centerMode: false,
    cssEase: 'linear',
    slidesToShow: 3,
    draggable:false,
    focusOnSelect:false,
    pauseOnFocus:false,
    pauseOnHover:false,
    slidesToScroll: 1,
    variableWidth: true,
    infinite: true,
    initialSlide: 1,
    arrows: false,
    buttons: false
  });
});


   // breakpoints
const breakpoint = {
  // extra small screen / phone
  xs: 0,
  // small screen / phone
  sm: 576,
  // medium screen / tablet
  md: 768,
  // large screen / desktop
  lg: 992,
  // extra large screen / wide desktop
  xl: 1200,
  // extra extra large screen / full hd
  xxl: 1400
};

// init slick slider
$("#slick").slick({
  dots: true,
  infinite: true,
  autoplay: true,
  autoplaySpeed: 500,
  speed: 5000,
  adaptiveHeight: true,
  mobileFirst: true,
  slidesToShow: 2,
  slidesToScroll: 1,
  variableWidth:true,
  responsive: [
    {
      breakpoint: breakpoint.sm,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: breakpoint.md,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: breakpoint.lg,
      settings: {
        slidesToShow: 4,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: breakpoint.xl,
      settings: {
        slidesToShow: 7,
        slidesToScroll: 1

      }
    },
    {
      breakpoint: breakpoint.xxl,
      settings: {
        slidesToShow: 8,
        slidesToScroll: 1
      }
    }
  ]
});

// jQuery(document).ready(function($) {
//   $('.slide-also').slick({
//     speed: 8000,
//     autoplay: true,
//     autoplaySpeed: 0,
//     centerMode: false,
//     cssEase: 'linear',
//     draggable:false,
//     focusOnSelect:false,
//     pauseOnFocus:false,
//     pauseOnHover:false,
    
//     variableWidth: true,
//     infinite: true,
   
//     arrows: false,
//     buttons: false
    
//   });
// });






   // what's up icon
    /*var url = 'https://wati-integration-prod-service.clare.ai/v2/watiWidget.js?72882';
    var s = document.createElement('script');
    s.type = 'text/javascript';
    s.async = true;
    s.src = url;
    var options = {
        "enabled": true,
        "chatButtonSetting": {
            "backgroundColor": "#0CD481",
            "ctaText": "Join Our Community ",
            "borderRadius": "25",
            "marginLeft": "0",
            "marginRight": "20",
            "marginBottom": "20",
            "ctaIconWATI": false,
            "position": "right"
        },
        "brandSetting": {
            "brandName": "Stockwiz",
            "brandSubTitle": "undefined",
            "brandImg": "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRp4AU_CbyoPe43La6RFNa_A5m-jh4B42W2dKhjncwp_Q&s",
            "welcomeText": "Hi. How can I help you?",
            "messageText": "Hello, %0A%0AI just visited your website, I have some queries. Please connect me with the support team. %0A%0A{{page_title}}%0A{{page_link}}",
            "backgroundColor": "#0CD481",
            "ctaText": "Chat With Us",
            "borderRadius": "25",
            "autoShow": false,
            "phoneNumber": "xxxxx"
        }
    };
    s.onload = function() {
        CreateWhatsappChatWidget(options);
    };
    var x = document.getElementsByTagName('script')[0];
    x.parentNode.insertBefore(s, x);*/
            







window.addEventListener('load', function() {
    // When the website is fully loaded, hide the loader
    loader = document.querySelector('.loader');
        var xhr = new XMLHttpRequest();
    // loader.style.display = 'none';
     loader.style.display = 'none';
    // Add class to body to prevent scrolling
    document.body.classList.remove('body-no-scroll');
});




        

// $('.membership-btnlink').on('click',function (e) {
//   var target = this.hash,
//       $target = $('index.html#membership_plan');

//   $('html, body').stop().animate({
//     'scrollTop': $target.offset().top-120
//   }, 50, 'swing', function () {
//     window.location.hash = target;
//   });
// });
    


