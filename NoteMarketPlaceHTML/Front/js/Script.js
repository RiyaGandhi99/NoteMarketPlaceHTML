/*===============================
             Preloader
================================= */
$(window).on('load', function () {
    $("#status").fadeOut();
    $("#preloader").delay(500).fadeOut('slow');
});

/*===============================
             Password Toggle
================================= */
$(".toggle-password").click(function () {

    $(this).toggleClass("eye");
    var input = $($(this).attr("toggle"));
    if (input.attr("type") == "password") {
        input.attr("type", "text");
    } else {
        input.attr("type", "password");
    }
});

/*===============================
             Navigation
================================= */
/* Show and Hide White Navigation */
$(function () {

    // Show/Hide Nav On Page Load
    ShowHideNav();

    $(window).scroll(function () {

        // Show/Hide Nav On Window's Scroll
        ShowHideNav();

    });

    function ShowHideNav() {

        if ($(window).scrollTop() > 50) {

            //Show White Top
            $("#header nav").addClass("white-nav-top");

            //Show Dark Logo
            $("#header .navbar-brand img").attr("src", "images/Homepage/logo.png");


        } else {

            //Hide White Top
            $("#header nav").removeClass("white-nav-top");

            //Hide Logo
            $("#header .navbar-brand img").attr("src", "images/Homepage/top-logo.png");

        }

    }
});
//Smooth Scrolling 
$(function () {

    $("a.smooth-scroll").click(function (event) {

        event.preventDefault();

        //get section ids like #team , #home , #contact and etc..
        var section_id = $(this).attr("href");

        $("html, body").animate({

            scrollTop: $(section_id).offset().top - 64

        }, 1250, "easeInOutExpo");

    });

});

/*===============================
             Mobile Menu
================================= */
$(function () {

    // Show mobile nav
    $(".navbar-toggler-icon").click(function () {
        $(".navbar").css("height", "100%");
        $('.navbar').css('display','block');
        $('.navbar-toggler-icon').css('display','none');
        $('#mobile-nav-close-btn').css('display','block');
    });

    // Hide mobile nav
    $("#mobile-nav-close-btn").click(function () {
        $(".navbar-collapse").collapse("hide");
        $(".navbar").css("height", "12%");
        $('.navbar-toggler-icon').css('display','block');
        $('#mobile-nav-close-btn').css('display','none');
    });

});

/*===============================
             FAQ
================================= */
$(document).ready(function(){
  
 $('.card .collapse').on('shown.bs.collapse',function(){
  $(this).parent().find('img').attr('src','images/FAQ/minus.png');
  $(this).parent().find('.card-header').css('background-color','#fff').css('border-bottom','none');
 });
 $('.card .collapse').on('hidden.bs.collapse',function(){
  $(this).parent().find('img').attr('src','images/FAQ/add.png');
  $(this).parent().find('.card-header').css('background-color','rgba(0,0,0,.03)').css('border-bottom','1px solid rgba(0,0,0,0.125)');
 });
});


