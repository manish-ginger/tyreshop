;
(function($) {
    "use strict"

    //jquery for toggle dropdown menus
    $(document).ready(function() {
        //toggle sub-menus
        $(".sub-btn").click(function() {
            $(this).next(".sub-menu").slideToggle();
        });

        //toggle more-menus
        $(".more-btn").click(function() {
            $(this).next(".more-menu").slideToggle();
        });
    });

    //javascript for the responsive navigation menu
    var menu = document.querySelector(".menu");
    var menuBtn = document.querySelector(".menu-btn");
    var closeBtn = document.querySelector(".close-btn");

    menuBtn.addEventListener("click", () => {
        menu.classList.add("active");
    });

    closeBtn.addEventListener("click", () => {
        menu.classList.remove("active");
    });

    //javascript for the navigation bar effects on scroll
    window.addEventListener("scroll", function() {
        var header = document.querySelector("header");
        header.classList.toggle("sticky", window.scrollY > 0);
    });

    var nav_offset_top = $('header').height() + 50;
    /*-------------------------------------------------------------------------------
    Navbar 
    -------------------------------------------------------------------------------*/

    //* Navbar Fixed  
    function navbarFixed() {
        if ($('.header_area').length) {
            $(window).scroll(function() {
                var scroll = $(window).scrollTop();
                if (scroll >= nav_offset_top) {
                    $(".header_area").addClass("navbar_fixed");
                } else {
                    $(".header_area").removeClass("navbar_fixed");
                }
            });
        };
    };
    navbarFixed();



    $(document).ready(function() {
        $("#change").click(function() {
            $("#search").toggle(500);
            $("i", this).toggleClass("fa fa-search fa fa-times");
        });
    });

    /*----------------------------------------------------*/
    /*  Parallax Effect js
    /*----------------------------------------------------*/
    function parallaxEffect() {
        $('.bg-parallax').parallax();
    }
    parallaxEffect();




    if (document.getElementById("number-section")) {
        $('.counter').counterUp({
            delay: 10,
            time: 1000
        });
    }


    //------- Owl Carusel  js --------//




    $(document).ready(function() {


        /*-------------------------------------------------------------------------------
        Testimonial Slider 
        -------------------------------------------------------------------------------*/

        $('.testi_slider').owlCarousel({
            loop: true,
            margin: 30,
            items: 1,
            nav: false,
            autoplay: 2500,
            smartSpeed: 1500,
            dots: true,
            responsiveClass: true
        })


        /*-------------------------------------------------------------------------------
        Brand Slider 
        -------------------------------------------------------------------------------*/
        $(".brand-carousel").owlCarousel({
            items: 1,
            autoplay: false,
            loop: true,
            nav: false,
            margin: 30,
            dots: false,
            responsive: {
                0: {
                    items: 1,
                },
                420: {
                    items: 1,
                },
                480: {
                    items: 3,
                },
                768: {
                    items: 3,
                },
                992: {
                    items: 5,
                }
            }
        });


    });





    $('#exampleModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data('whatever') // Extract info from data-* attributes
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('.modal-title').text('New message to ' + recipient)
        modal.find('.modal-body input').val(recipient)
    })












})(jQuery)