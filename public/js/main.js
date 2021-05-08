$(".dropdown-menu").hide();
$(function () {
    // menu button
    $(".menu-mobile").click(function () {
        $(".dropdown-menu").slideToggle("200");
    });
});
