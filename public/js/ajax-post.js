$(document).ready(function () {
    var form = "#aumentar";

    $(form).on("submit", function (event) {
        event.preventDefault();

        var url = $(this).attr("action");

        $.ajax({
            url: url,
            method: "POST",
            data: new FormData(this),
            dataType: "JSON",
            contentType: false,
            cache: false,
            processData: false,
            success: function (response) {
                $(form).trigger("reset");
                //alert(response.success)
                $("#cant").text(response.success);
            },
            error: function (response) {},
        });
    });
});

function aumentar() {
    $(document).ready(function() {
        var cant = $("#cantidad").val();
        $("#cantidad").val(parseInt(cant) + 1);
    });
}

function disminuir() {
    $(document).ready(function() {
        var cant = $("#cantidad").val();
        $("#cantidad").val(parseInt(cant) - 1);
    });
}
