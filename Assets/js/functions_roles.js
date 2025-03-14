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
    var ajaxUrl = base_url + '/Roles/setRol';
    var formData = new FormData(formRol);
    request.open("POST", ajaxUrl, true);
    request.send(formData);
    request.onreadystatechange = function() {
        // Validación para verificar que si llegue la información
        if (request.readyState === 4) {
            if (request.status === 200) {
                // Aquí se puede procesar la respuesta, actualizar la interfaz, etc.
                var objData = JSON.parse(request.responseText);
                // Validación de objData
                if (objData.status) 
                {
                    $('#modalFormRol').modal("hide");
                    formRol.reset();
                    swal("Roles de usuario", objData.msg, "success");
                    tableRoles.api().ajax.reload(function(){
                        //fntEditRol();
                        //fntDenRol();
                        //fntPermisos();
                    });
                } else {
                    swal("Error", objData.msg, "error");
                }
            } else {
                console.error("Error en la petición:", request.statusText);
            }
        }
    }
}

$('#tableRoles').DataTable();

function openModal() {
    document.querySelector('#idRol').value="";
    document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegistrer");
    document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");
    document.querySelector('#btnText').innerHTML = "Guardar";
    document.querySelector('#titleModal').innerHTML = "Nuevo Rol";
    document.querySelector("#formRol").reset();
    $('#modalFormRol').modal('show');
}
//Se agrega métódo para cargar el método load
window.addEventListener('load', function(){
    fnEditRol();
}, false);
//Acción del botón Editar en la tabla de roles
function fnEditRol() {
    var btnEditRol = document.querySelectorAll(".btnEditRol");
    btnEditRol.forEach(function(btnEditRol) {
        btnEditRol.addEventListener('click', function() {
            //console.log("Se hizo clic en el botón editar");
            document.querySelector('#titleModal').innerHTML = "Actualizar Rol";
            document.querySelector('.modal-header').classList.replace("headerRegistrer", "headerUpdate");
            document.querySelector('#btnActionForm').classList.replace("btn-primary", "btn-info");
            document.querySelector('#btnText').innerHTML = "Actualizar";
            $('#modalFormRol').modal('show');
        });
    });
}
