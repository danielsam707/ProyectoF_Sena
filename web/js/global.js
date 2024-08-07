$(document).ready(function () {
    $(document).on("keyup", "#filtro", function () {
        let buscar = $(this).val();
        let url = $(this).attr("data-url");

        $.ajax({
            url: url,
            data: "buscar=" + buscar,
            type: "POST",
            success: function (resp) {
                $("tbody").html(resp);
            }
        })
    });
})