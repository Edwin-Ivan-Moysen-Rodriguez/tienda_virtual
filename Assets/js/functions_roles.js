var tableRoles;
document.addEventListener('DOMContentLoaded', function(){
    tableRoles = $('#tableRoles').dataTable({
        "aProcessing": true,
        "aServerSide": true,
        "language": {
            "url": "https://cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax": {
            "url": " " + base_url + "/roles/getRoles",
            "dataSrc": ""
        },
        "columns": [
            {"data": "idrol"},
            {"data": "nombrerol"},
            {"data": "descripcion"},
            {"data": "status"},
            {"data": "options"}
        ],
        "responsive": true,
        "bDestroy": true,
        "iDisplayLength": 10,
        "order": [[0, "desc"]]
    });
});
// Nuevo Rol
var formRol = document.querySelector("#formRol");
formRol.onsubmit = function(e) {
    e.preventDefault();
    // Variables de las formas usadas
    var strNombre = document.querySelector('#txtNombre').value;
    var strDescripcion = document.querySelector('#txtDescripcion').value;
    var intStatus = document.querySelector('#listStatus').value;
    // Validamos que todos los campos contengan información
    if (strNombre === '' || strDescripcion === '' || intStatus === '') {
        swal("Atención", "Todos los campos son obligatorios", "error");
        return false;
    }
    // Validación del navegador para la creación del objeto XMLHttpRequest
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxUrl = base_url + '/RolessetRol';
    var formData = new FormData(formRol);
    request.open("POST", ajaxUrl, true);
    request.send(formData);
    request.onreadystatechange = function() {
        // Validación para verificar que si llegue la información
        if (request.readyState === 4) {
            if (request.status === 200) {
                console.log("Respuesta exitosa:", request.responseText);
                // Aquí puedes procesar la respuesta, actualizar la interfaz, etc.
                console.log(request.responseText);
            } else {
                console.error("Error en la petición:", request.statusText);
            }
        }
    }
}

$('#tableRoles').DataTable();
function openModal()
{
    $('#modalFormRol').modal('show');
}