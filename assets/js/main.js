$(function () {
    var avaliacao = $(".avaliacao");
    $(".rateYo").rateYo({
        spacing: "10px"
    });
    $(".rateYo").rateYo("option", "readOnly", true);
    $(".rateYo").each(function (key, value) {
        var valor = avaliacao[key].value;
        $(this).rateYo("rating", valor);
    });
});