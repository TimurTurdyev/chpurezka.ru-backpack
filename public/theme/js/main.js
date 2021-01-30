/* -------------------------------------------------------------------
 * Theme Name            : Corcota - Drone App Landing Page
 * Author Name           : Yucel Yilmaz
 * Created Date          : 20 November 2020
 * Version               : 1.0
 * File                  : main.js
------------------------------------------------------------------- */
/* -------------------------------------------------------------------
   All Functions                               
   ------------------------ /
 * 01.Preloader
 * 02.Header
 * 03.Counter Up
 * 04.Owl Carousel
 * 05.Wow Js
 * 06.Background Image
 * 07.Magnific Popup
 * 08.Wow Js
 * 09.Skills Bar
 * 10.Contact Form
------------------------------------------------------------------- */

$( document ).ready( function() {
    // All Functions
    Corcota_PreLoader();
    Corcota_Header();
    Corcota_CounterUp();
    Corcota_Carousel();
    Corcota_SmoothScroll();
    Corcota_BgImgPath();
    Corcota_MGFPopup();
    Corcota_WowJs();
    Corcota_SkillsBar();
    Corcota_Contact_Form();
});

/* -------------------------------------------------------------------
 * 01.Preloader
------------------------------------------------------------------- */
function Corcota_PreLoader(){
    "use-scrict";

    // Variables
    let preloaderWrap = $( '#preloader-wrap' );
    let loaderInner = preloaderWrap.find( '.preloader-inner' );
 
    $( window ).ready(function(){
        loaderInner.fadeOut(); 
        preloaderWrap.delay(350).fadeOut( 'slow' );
    });   
}

/* -------------------------------------------------------------------
 * 02.Header
------------------------------------------------------------------- */
function Corcota_Header() {
    "use-strict";

    // Variables
    let header          = $( '.header' );
    let scrollTopBtn    = $( '.scroll-top-btn' );
    let windowWidth     = $( window ).innerWidth();
    let scrollTop       = $( window ).scrollTop();
    let $dropdown       = $( '.dropdown' );
    let $dropdownToggle = $( '.dropdown-toggle' );
    let $dropdownMenu   = $( '.dropdown-menu' );
    let showClass       = 'show';
    
    $( '.menu-link' ).on( 'click', function(){
        $( '#fixedNavbar' ).collapse( 'hide' );
    });

    // When Window On Scroll
    $( window ).on( 'scroll', function(){
        let scrollTop = $( this ).scrollTop();

        if( scrollTop > 85 ) {
            header.addClass( 'header-shrink' );
            scrollTopBtn.addClass( 'active' );
        }else {
            header.removeClass( 'header-shrink' );
            scrollTopBtn.removeClass( 'active' );
        }
    });

    // The same process is done without page scroll to prevent errors.
    if( scrollTop > 85 ) {
        header.addClass( 'header-shrink' );
        scrollTopBtn.addClass( 'active' );
    }else {
        header.removeClass( 'header-shrink' );
        scrollTopBtn.removeClass( 'active' );
    }

    // Window On Resize Hover Dropdown
    $( window ).on( 'resize', function() {
        let windowWidth  = $( this ).innerWidth();

        if ( windowWidth > 991 ) {
            $dropdown.hover(
                function() {
                    let hasShowClass  =  $( this ).hasClass( showClass );
                    if( hasShowClass!==true ){
                        $( this ).addClass( showClass );
                        $( this ).find( $dropdownToggle ).attr( 'aria-expanded', 'true' );
                        $( this ).find( $dropdownMenu ).addClass( showClass );
                    }
                },
                function() {
                    $( this ).removeClass( showClass);
                    $( this ).find( $dropdownToggle ).attr( 'aria-expanded', 'false' );
                    $( this ).find( $dropdownMenu ).removeClass( showClass );
                }
            );
        }else {
            $dropdown.off( 'mouseenter mouseleave' );
            header.find( '.main-menu' ).collapse( 'hide' );
        }
    });
    // The same process is done without page scroll to prevent errors.
    if ( windowWidth > 991 ) {
        $dropdown.hover(
            function() {
                const $this = $( this );

                var hasShowClass  = $this.hasClass( showClass );

                if( hasShowClass!==true ){
                    $this.addClass( showClass);
                    $this.find ( $dropdownToggle ).attr( 'aria-expanded', 'true' );
                    $this.find( $dropdownMenu ).addClass( showClass );
                }
            },
            function() {
                const $this = $( this );
                $this.removeClass( showClass );
                $this.find( $dropdownToggle ).attr( 'aria-expanded', 'false' );
                $this.find( $dropdownMenu ).removeClass( showClass );
            }
        );
    }else {
        $dropdown.off( 'mouseenter mouseleave' );
    }
}

/* -------------------------------------------------------------------
 * 03.Counter Up
------------------------------------------------------------------- */
function Corcota_CounterUp() {
    "use-strict";

    // Variables
    let counterItem     = $( '.counter' );

    counterItem.counterUp({
        delay: 10,
        time: 1000
    });
}

/* -------------------------------------------------------------------
 * 04.Owl Carousel
------------------------------------------------------------------- */
function Corcota_Carousel(){

    "use-strict";

    // Variables
    let servicesCarousel        = $( '#services-carousel');
    let projectsCarousel        = $( '#projects-carousel');
    let teamCarousel            = $( '#team-carousel');
    let testimonialsCarousel    = $( '#testimonials-carousel');
    let blogCarousel            = $( '#blog-carousel');
    let heroSlider              = $( '#hero-slider' );
    let recentProjectSlider     = $( '#recent-projects-carousel' );

    servicesCarousel.owlCarousel({
        loop:true,
        margin: 30,
        dots: false,
        nav:true,
        autoplay:true,
        smartSpeed:600,
        autoplayTimeout:5000,
        autoplayHoverPause:true,
        navText: ["<span class='fa fa-arrow-left'></span>", "<span class='fa fa-arrow-right'></span>"],
        responsive:{
            0:{
                items:1
            },
            600: {
                items:1
            },
            750:{
                items:2
            },
            1000:{
                items:3
            }
        }
    });
    projectsCarousel.owlCarousel({
        loop:false,
        margin: 30,
        dots: false,
        nav:true,
        autoplay:true,
        smartSpeed:600,
        autoplayTimeout:5000,
        autoplayHoverPause:true,
        navText: ["<span class='fa fa-arrow-left'></span>", "<span class='fa fa-arrow-right'></span>"],
        responsive:{
            0:{
                items:1
            },
            600: {
                items:1
            },
            750:{
                items:2
            },
            1000:{
                items:3
            }
        }
    });
    teamCarousel.owlCarousel({
        loop: true,
        margin: 30,
        dots: false,
        nav:true,
        autoplay:true,
        smartSpeed:600,
        autoplayTimeout:5000,
        autoplayHoverPause:true,
        navText: ["<span class='fa fa-arrow-left'></span>", "<span class='fa fa-arrow-right'></span>"],
        responsive:{
            0:{
                items:1
            },
            600: {
                items:1
            },
            750:{
                items:2
            },
            1000:{
                items:3
            }
        }
    });
    blogCarousel.owlCarousel({
        loop: true,
        margin: 30,
        dots: false,
        nav:true,
        autoplay:true,
        smartSpeed:600,
        autoplayTimeout:5000,
        autoplayHoverPause:true,
        navText: ["<span class='fa fa-arrow-left'></span>", "<span class='fa fa-arrow-right'></span>"],
        responsive:{
            0:{
                items:1
            },
            600: {
                items:1
            },
            750:{
                items:2
            },
            1000:{
                items:3
            }
        }
    });
    testimonialsCarousel.owlCarousel({
        loop: true,
        margin: 30,
        dots: false,
        nav:true,
        autoplay:true,
        smartSpeed:600,
        autoplayTimeout:5000,
        autoplayHoverPause:true,
        navText: ["<span class='fa fa-arrow-left'></span>", "<span class='fa fa-arrow-right'></span>"],
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            767:{
                items:1
            },
            1000:{
                items:2
            }
        }
    });
    heroSlider.owlCarousel({
        loop: true,
        margin:0,
        nav:true,
        dots: true,
        autoplay:true,
        smartSpeed:600,
        autoplayTimeout:5000,
        autoplayHoverPause:true,
        navText: ["<span class='fa fa-arrow-left'></span>", "<span class='fa fa-arrow-right'></span>"],
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            1000:{
                items: 1
            }
        }
    });
    recentProjectSlider.owlCarousel({
        loop: true,
        margin:30,
        nav: false,
        dots: true,
        autoplay:true,
        smartSpeed:600,
        autoplayTimeout:5000,
        autoplayHoverPause:true,
        navText: ["<span class='fa fa-arrow-left'></span>", "<span class='fa fa-arrow-right'></span>"],
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            1000:{
                items: 1
            }
        }
    });
}

/* -------------------------------------------------------------------
 * 05.Smooth Scroll
------------------------------------------------------------------- */
function Corcota_SmoothScroll() {
    "use-strict";

    $.scrollIt({
        upKey: 38,             // key code to navigate to the next section
        downKey: 40,           // key code to navigate to the previous section
        easing: 'linear',      // the easing function for animation
        scrollTime: 600,       // how long (in ms) the animation takes
        activeClass: 'active', // class given to the active nav element
        onPageChange: null,    // function(pageIndex) that is called when page is changed
        topOffset: 0           // offste (in px) for fixed top navigation
    });
}

/* -------------------------------------------------------------------
 * 06.Background Image Path
------------------------------------------------------------------- */
function Corcota_BgImgPath(){
    "use-scrict";

    // Variables
    let dataBgItem         = $( '*[data-bg-image-path]' );

    dataBgItem.each( function() {
        let imgPath        = $( this ).attr( 'data-bg-image-path' );
        $( this).css( 'background-image', 'url(' + imgPath + ')' );
    });
}

/* -------------------------------------------------------------------
 * 07.Magnific Popup
------------------------------------------------------------------- */
function Corcota_MGFPopup(){
    "use-scrict";

    // Variables
    let youtubePopup           = $( '.video-btn' );
    let portfolioGrid          = $('.latest-project-item');
    let galleryGridWrapper     = $( '#portfolioGrid' );
    let galleryMasonaryWrapper = $( '#portfolioMasonry' );
    let portfolioFilterBtn     = $( '.gallery-filter a' );

    youtubePopup.magnificPopup({
        disableOn: 700,
        type: 'iframe',
        mainClass: 'mfp-fade',
        removalDelay: 160,
        preloader: false,
        fixedContentPos: false
    });

    portfolioGrid.magnificPopup({
        delegate: '.portfolio-zoom-link',
        type: 'image',
		gallery: {
			enabled: true
        }
    });

    galleryGridWrapper.imagesLoaded( function() {
        let grid = galleryGridWrapper.isotope({
            itemSelector: '.gallery-item',
            percentPosition: true,
            masonry: {
                columnWidth: '.gallery-item',
            }
        });
        portfolioFilterBtn.on( 'click', function() {
            let filterValue = $(this).attr( 'data-gallery-filter' );
            grid.isotope({
                filter: filterValue
            });
        });
    });

    galleryMasonaryWrapper.imagesLoaded( function() {
        let grid = galleryMasonaryWrapper.isotope({
            itemSelector: '.gallery-item',
            percentPosition: true,
            masonry: {
                columnWidth: '.gallery-item',
            }
        });
        portfolioFilterBtn.on( 'click', function() {
            let filterValue = $(this).attr( 'data-gallery-filter' );
            grid.isotope({
                filter: filterValue
            });
        });
    });

    portfolioFilterBtn.on( 'click', function(event) {
        portfolioFilterBtn.removeClass( 'current' );
        $(this).addClass( 'current' );
        event.preventDefault();
    });
}

/* -------------------------------------------------------------------
 * 08.Wow Js
------------------------------------------------------------------- */
function Corcota_WowJs(){
    "use-scrict";

    var wow = new WOW(
            {
            boxClass:     'wow',     
            animateClass: 'animated',
            offset:       0,         
            mobile:       true,      
            live:         true       
        }
    )
    wow.init();
}

/* ------------------------------------------------------------------- */
/* 09.Skills Bar
/* ------------------------------------------------------------------- */ 
function Corcota_SkillsBar(){
    "use-strict";

    // Variables
    var skillsItem              = $('.skills-item');

    skillsItem.each(function(){
        // Variables
        var skillPercent        = $(this).find(".skills-progress-value").attr("data-percent");

        $(this).find(".skills-progress-value").css("width",skillPercent +"%");
        $(this).find(".skills-item-text .skill-percent").html(skillPercent+"%");
    });
}

/* ------------------------------------------------------------------- */
/* 10.Contact Form
/* ------------------------------------------------------------------- */
function Corcota_Contact_Form(){

    "use-scrict";
    let contactForm = $( '#contactForm' );
    let formControl = contactForm.find( '.contact-form-control' );

    // Added AutoComplete Attribute Turned Off
    formControl.attr("autocomplete","off");

    //  Captcha Variables    
    let contactFormCaptchaVal = $("#contactFormCaptchaVal");
    let contactFormCaptchaSpan = $('#contactFormCaptchaSpan');
    let contactFormCaptchaInput = $('#contactFormCaptchaInput');

    // Generates the Random number function 
    function randomNumber(){
        let a = Math.ceil(Math.random() * 9) + '';
        let b = Math.ceil(Math.random() * 9) + '';
        let c = Math.ceil(Math.random() * 9) + '';
        let d = Math.ceil(Math.random() * 9) + '';
        let e = Math.ceil(Math.random() * 9) + '';
        let code = a + b + c + d + e;
        contactFormCaptchaVal.val(code);
        contactFormCaptchaSpan.html(code);
    }

    // Called random number function
    randomNumber();

    // Validate the Entered input aganist the generated security code function   
    function validateCaptcha() {
        let str1 = contactFormCaptchaVal.val();
        let str2 = contactFormCaptchaInput.val();
        if (str1 == str2) {
            return true;
        } else {
            return false;
        }
    }
    // Contact Form Submit
    contactForm.on("submit", function(event) {

        // Variables
        let $this = $(this);
        let name = $( 'input[name*="contact_name"]' ).val().trim();
        let email = $( 'input[name*="contact_email"]' ).val().trim();
        let phone = $( 'input[name*="contact_phone"]' ).val().trim();
        let subject = $( 'select[name*="contact_subject"]' ).val().trim();
        let message = $( 'textarea[name*="contact_message"]' ).val().trim();
        let validateEmail = $( 'input[name*="contact_email"]' ).EmailValidate();
        let validatePhone = $( 'input[name*="contact_phone"]' ).PhoneValidate();

        if (name =='' || email =='' || phone == '' || message == '' || contactFormCaptchaInput == '') {
            if($('.contact-alerts .empty-form').css("display") == "none"){
                $('.contact-alerts .empty-form').stop().slideDown().delay(5000).slideUp();
            }else {
                return false;
            }
        } else if (!validateEmail === true) {
            if($('.contact-alerts .email-invalid').css("display") == "none"){
                $('.contact-alerts .email-invalid').stop().slideDown().delay(5000).slideUp();
            }else {
                return false;
            }
        } else if (!validatePhone === true) {
            if($('.contact-alerts .phone-invalid').css("display") == "none"){
                $('.contact-alerts .phone-invalid').stop().slideDown().delay(5000).slideUp();
            }else {
                return false;
            }
        } else if (subject == '') {
            if($('.contact-alerts .empty-select').css("display") == "none"){
                $('.contact-alerts .empty-select').stop().slideDown().delay(5000).slideUp();
            }else {
                return false;
            }
        } else if (validateCaptcha() != true){
            if($('.contact-alerts .security-alert').css("display") == "none"){
                $('.contact-alerts .security-alert').stop().slideDown().delay(5000).slideUp();
            }else {
                return false;
            }
        } else {
            $this.find(':submit').prepend('<div class="fas fa-spinner fa-pulse ml-3"></div>');
            $this.find(':submit').attr('disabled','true');
            $.ajax({
                url: 'phpmailer/send_mail.php',
                data: {
                    contact_name: name,
                    contact_email: email,
                    contact_phone: phone,
                    contact_subject: subject,
                    contact_message: message,
                },
                type: 'POST',
                success: function(response) {
                    $('#contactForm')[0].reset();
                    if (response == true) {
                        $this.find(':submit').removeAttr('disabled');
                        $this.find(':submit').find(".fa-spinner").fadeOut();
                        $("#contactFormSuccessModal").modal("show");
                        // Called random number function
                        randomNumber();
                    } else {
                        $this.find(':submit').removeAttr('disabled');
                        $this.find(':submit').find("span").fadeOut();
                        $("#contactFormDangerModal").modal("show");
                        $("#contactFormDangerModal #error_message").text(response);
                        // Called random number function
                        randomNumber();
                    }
                }
            });
        }
        event.preventDefault();
    });
}