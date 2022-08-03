$("#hamburger").click(function() {
    if (!$("#nav").hasClass("active")) {
        $("#nav").addClass("active");
        if (window.matchMedia('(max-width: 1000px)').matches) {
            $("#nav").animate({
                width: "100%"
            }, 1000);
        } else {
            $("#nav").animate({
                width: "300px"
            }, 1000);

            $("#main").animate({
                marginLeft: "300px"
            }, 1000);
        }
    } else {
        $("#nav").removeClass("active");
        $("#nav").animate({
            width: "0"
        }, 1000);

        $("#main").animate({
            marginLeft: "0"
        }, 1000);
    }
});

$(".navbar__dropdown-btn").each(function() {
    $(this).click(function() {
        if (!$(this).parent().find(".navbar__dropdown-content").hasClass("dropdown_active")) {
            $(this).parent().find(".navbar__dropdown-content").addClass("dropdown_active");
        } else {
            $(this).parent().find(".navbar__dropdown-content").removeClass("dropdown_active");
        }
    }); 
})

$("#cookie-accept-btn").click(function () {
    let date = new Date();
    date.setDate(date.getDate()+2);
    document.cookie = "use_terms=true;path=/;expires=" + date.toUTCString();
    $(".cookie__accept").css("display", "none");
});