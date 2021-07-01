$(document).ready(function () {
    //showing overlay on clicking any project
    $(".overlay-trigger").click(function (e) { 
        e.preventDefault();
        $(".overlay").parent().removeClass("d-none");
        $(".overlay").css({
            "opacity": "0"
        });
        $(".overlay").animate({
            "opacity": "1"
        },600);
        $(".sideSection").css({
            "right": "-50%",
        });
        $(".sideSection").animate({
            "right": "0%"
        },600);
    });
    //hiding the overlay on clicking back button
    $(".myButton, .overlay-gutterSpace").click(function (e) { 
        e.preventDefault();
        $(".sideSection").animate({
            "right": "-60%"
        },600,function(){
            $(".overlay").parent().addClass("d-none");
        });
        $(".overlay").animate({
            "opacity": "0"
        },600);
    });
    autosize(document.getElementsByClassName("noscroll"));
});