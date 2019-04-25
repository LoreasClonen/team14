/* on load open*/
$(document).ready(function () {
    $("#overlay").css("display", "block");

    /* on click close */
    $("#overlay").click(function () {
        $("#overlay").css("display", "none");
    });
});
