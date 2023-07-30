$(".toggle_btn").click(function () {
    $(this).toggleClass("active");
    $(".description").toggleClass("active");

    if ($(".toggle_btn").hasClass("active")) {
        $(".toggle_text").text("Show Less");
        $("#description").html($("#description").data("full-description"));
    } else {
        $(".toggle_text").text("Show More");
        $("#description").html($("#description").data("limited-description"));
    }
});
