$(document).ready(function () {
    $("#image").on("change", function () {
        var files = $(this)[0].files;
        if (files.length >= 2) {
            $("#label_span").text(files.length + "imagen subida")
        } else {
            var filename = e.target.value.split('\\').pop();
            $("#label_span").text(filename);
        }


    });



});
