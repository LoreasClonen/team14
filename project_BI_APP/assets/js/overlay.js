/* on click open*/
$(document).ready(function () {
    $("#overlayknop").click(function () {
        $("#overlay").css("display", "block");
    });

    /* on click close */
    $("#overlay").click(function () {
        $("#overlay").css("display", "none");
    });
});


/*on click show form*/
$(document).ready(function () {
    $("#unchekced").click(function () {
        $("#formDate").css("display", "block");
    });

    /* on click close */
    $("#unchekced").click(function () {
        $("#formDate").css("display", "none");
    });
});