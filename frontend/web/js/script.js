$(document).ready(
        $("#formulario").on('beforeSubmit', () => {
            enviarFormularioAJAX($("#formulario"), success);
        }
    ).on('submit',
        e => e.preventDefault()
    )
);

function cargarMultiplesCheques() {
    let keys = $("#gridView_cargaMultiplesCheques").yiiGridView("getSelectedRows");
    console.log(keys);
    if (keys.length <= 0) {
        alert('Error')
        return;
    }
    $("#activos").val(keys.join(","));
    $("#formulario").submit();
}

function errorGenerico() {
    alert   ("Error");
}
function success() {
    alert("Success");
}

function enviarFormularioAJAX(formulario, callbackSuccess, callbackError = errorGenerico) {
    let form = $(formulario);
    let formData = form.serialize();
    $.ajax({
        url: form.attr("action"),
        type: form.attr("method"),
        data: formData,
        success: function (data) {
            callbackSuccess(data);
        },
        error: function (data) {
            callbackError(data);
        }
    })
}