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
