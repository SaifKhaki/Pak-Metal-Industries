$(document).ready(function(){
    var open = false;
    function func1(){
        $("nav").addClass("nav-scroll", 1000, "easeOutBounce");
    }
    function func2(){
        $("nav").removeClass("nav-scroll", 1000);
        $("nav a, nav .nav-link button").removeClass("text-secondary", 1000);
    }
    

    if(($(document).width() <= 980)){
        func1();
        $("#searchField").detach().appendTo("#separator");
        $("#searchField").addClass("mt-5");
        $("#searchField").addClass("px-5");
        $("#searchField").addClass("justify-content-center");
    }else{
        $(window).scroll(function(){
            if(($(window).scrollTop()>50)){
                func1();
            }
            else if($(window).scrollTop()<50){
                func2();
            }
        });    
    }

});