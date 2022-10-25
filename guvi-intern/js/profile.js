$(document).ready(function () {
    $.ajax({
        type: "GET",
        url: "http://localhost/guvi-intern/php/profile.php",
        dataType: "html",
        success: function (data) {
            $("#data").html(data);

        }
    });
});
