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
