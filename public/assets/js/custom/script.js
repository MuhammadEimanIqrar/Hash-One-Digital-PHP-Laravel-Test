$(document).ready(function () {
    // *Sidebar Scripts Start

    var screen = window.innerWidth;

    if (screen > 767) {
        $("#dismiss").html('<i class="fas fa-arrow-left"></i>');
    } else {
        $("#dismiss").html('<i class="fas fa-times"></i>');
    }

    $(".toggle_icon").on("click", function () {
        $("#sidebar").addClass("active");
        $(".overlay").addClass("active");
    });

    $("#dismiss, .overlay").on("click", function () {
        $("#sidebar").removeClass("active");
        $(".overlay").removeClass("active");
        $(".cart").css("display", "none");
    });
    // *Sidebar Scripts End

    // *Cart Script Start
    $(".shopping_bag").on("click", function () {
        $(".cart").fadeToggle("fast");
        $(".overlay").addClass("active");
    });
    // *Cart Script End

    // *Search Script Start
    $(".search, .search_box").on("focus, click", function () {
        $(".search").addClass("search_type");
        $(".search").focus();
        $(".search").removeClass("search");
    });

    $(".search").on("focusout", function () {
        $(this).addClass("search");
        $(this).removeClass("search_type");
    });
    // *Search Script End

    // *Product Slider Scroll Script Start
    // elm = $('.product_slider');
    // elm.addEventListener("overflow", scroll());

    // function scroll() {
    //     horizontal_shift = elm.width() / 2;
    //     console.log(horizontal_shift, elm);
    //     elm.scrollTo(0, horizontal_shift)
    // }
    // *Product Slider Scroll Script End

    // * On Product Card Hover Animation Start
    $(document).on(
        "mouseover",
        ".product_image, .hover_effects, .actions_tray",
        function () {
            var parent = $(this).parent();
            parent.find(".hover_effects").removeClass("d-none");

            // var hover_image = $(this).data("hover_image");
            // var previous_image = $(this).attr("src");
            // $(this).attr("src", hover_image);

            // var img = $(this);

            $(document).on(
                "mouseout",
                ".product_image, .hover_effects, .actions_tray",
                function () {
                    // img.attr("src", previous_image);
                    parent.find(".hover_effects").addClass("d-none");
                }
            );
        }
    );
    // * On Product Card Hover Animation End
});
