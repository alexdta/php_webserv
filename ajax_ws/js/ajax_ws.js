listaMitos();

$("#guardar").click(function (e) {
    e.preventDefault();

    var mito = $("#mito").val();
    var descripcion = $("#descripcion").val();

    $('#frmAgregar')[0].reset();

    $.post("http://localhost/webserv_php/rest_ws/api/mitos/agregar", { mito: mito, descripcion: descripcion }, listaMitos);

});

function listaMitos() {
    $.get('http://localhost/webserv_php/rest_ws/api/mitos/lista', llenarTabla);
}

function llenarTabla(data, status) {
    var tabla = $("#tblMitos tbody");

    if (status == 'success') {

        tabla.empty();

        $.each(data, function (indice, valor) {
            tabla.append("<tr><td>" + valor.mito + "</td><td>" + valor.descripcion + "</td></tr>");
        });
    }
}