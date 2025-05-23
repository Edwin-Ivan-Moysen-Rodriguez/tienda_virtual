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
    var intIdRol = document.querySelector('#idRol').value;
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
                        fnEditRol();
                        fntEditRol();
                        fntDenRol();
                        fntPermisos();
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
    fntPermisos();
    fnEditRol();
    fntDelRol();
}, false);
//Acción del botón Editar en la tabla de roles
function fnEditRol() {
    var btnEditRol = document.querySelectorAll(".btnEditRol");
    btnEditRol.forEach(function(btnEditRol) {
        btnEditRol.addEventListener('click', function() {
            // Actualización del modal
            document.querySelector('#titleModal').innerHTML = "Actualizar Rol";
            document.querySelector('.modal-header').classList.replace("headerRegistrer", "headerUpdate");
            document.querySelector('#btnActionForm').classList.replace("btn-primary", "btn-info");
            document.querySelector('#btnText').innerHTML = "Actualizar";
            
            // Obtener el id del rol desde el atributo 'rl' del botón
            var idrol = this.getAttribute("rl");
            
            // Crear el objeto AJAX de forma compatible
            var request = window.XMLHttpRequest 
                ? new XMLHttpRequest() 
                : new ActiveXObject('Microsoft.XMLHTTP');
            
            // Construir la URL 
            var ajaxUrl = base_url + '/Roles/getRol/' + idrol;
            // Si tu controlador espera el parámetro vía query string, podrías usar:
            // var ajaxUrl = base_url + '/Roles/getRol?id=' + idrol;
            
            // Configurar y enviar la solicitud
            request.open("GET", ajaxUrl, true);
            request.send();
            
            request.onreadystatechange = function(){
                if (request.readyState == 4 && request.status == 200) {
                    // Textendo la obtención del rol en la consola del navegador
                    // console.log(request.responseText);
                    
                    var objData = JSON.parse(request.responseText);
                    // Validación del converción JSON a objeto
                    if(objData.status)
                    {
                        // Como data es un array, tomas el primer objeto con [0]
                        let rol = objData.data[0]; 
                        // Mostrando los valores del objeto 
                        document.querySelector("#idRol").value = rol.idrol;
                        document.querySelector('#txtNombre').value = rol.nombrerol;
                        document.querySelector('#txtDescripcion').value = rol.descripcion;
                        // Validación del status de del objeto
                        if(objData.data.status == 1)
                            var optionSelect = '<option value="1" selected class="notBlock">Activo</option>';
                        else
                            var optionSelect = '<option value="2" selected class="notBlock">Inactivo</option>';
                        //
                        var htmlSelect = `${optionSelect}
                                            <option value="1">Activo</option>
                                            <option value="2">Inactivo</option>
                                        `;
                        document.querySelector('#listStatus').innerHTML = htmlSelect;
                        // Mostrar el modal
                        $('#modalFormRol').modal('show');
                    }
                    else
                        swal("Error", objData.msg, "error");
                }
            } 
        });
    });
}
// Función evento de botoón eliminar rol
function fntDelRol() {
    var btnDelRol = document.querySelectorAll(".btnDelRol");
    btnDelRol.forEach(function(btnDelRol){
        btnDelRol.addEventListener('click', function(){
            var idrol = this.getAttribute("rl");
            Swal.fire({
                title: "Eliminar Rol",
                text: "¿Deseas eliminar el rol?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Si, eliminar.",
                cancelButtonText: "No, cancelar."
            }).then((result) => {
                if (result.isConfirmed) {
                    // Script para eliminar el rol vía AJAX
                    var request = window.XMLHttpRequest 
                        ? new XMLHttpRequest() 
                        : new ActiveXObject('Microsoft.XMLHTTP');
                    var ajaxDelRol = base_url + '/Roles/delRol/';
                    var strData = "idrol=" + idrol;
                    request.open("POST", ajaxDelRol, true);
                    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                    request.send(strData);
                    request.onreadystatechange = function() {
                        if (request.readyState == 4 && request.status == 200) {
                            var objData = JSON.parse(request.responseText);
                            if (objData.status) {
                                Swal.fire({
                                    title: "¡Eliminar!",
                                    text: objData.msg,
                                    icon: "success"
                                });
                                tableRoles.api().ajax.reload(function(){
                                    fntPermisos();
                                    fnEditRol();
                                    fntDelRol();
                                });
                            } else {
                                Swal.fire({
                                    title: "¡Atención!",
                                    text: objData.msg,
                                    icon: "error"
                                });
                            }
                        }
                    };
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    // Opcional: acciones en caso de cancelar
                }
            });
        });
    });
}
//Función evento clic del btnPermisosRol
function fntPermisos() {
    var btnPermisosRol = document.querySelectorAll(".btnPermisosRol");
    btnPermisosRol.forEach(function(btnPermisosRol){
        btnPermisosRol.addEventListener('click', function(){
            // Petición de los modulos a la base de datos
            var idrol = this.getAttribute("rl");
            var request = window.XMLHttpRequest 
                        ? new XMLHttpRequest() 
                        : new ActiveXObject('Microsoft.XMLHTTP');
            var ajaxUrl = base_url + '/Permisos/getPermisosRol/' + idrol;
            request.open("GET", ajaxUrl, true);
            request.send();
            // Validación de la solicitud
            request.onreadystatechange = function(){
                if(request.readyState == 4 && request.status == 200){
                    document.querySelector('#contentAjax').innerHTML = request.responseText;
                    $('.modalPermisos').modal('show');
                    document.querySelector('#formPermisos').addEventListener('submit', fnfSaverPermisos, false);
                }
            }
            // Mostrando el Modal Permisos
            $('.modalPermisos').modal('show');
        });
    });
}

function fntSavePermisos(event){
    event.preventDefault();
    var formElement = document.querySelector("#formPermisos");
    var request = (window.XMLHttpRequest) 
        ? new XMLHttpRequest() 
        : new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxUrl = base_url + 'Permisos/setPermisos';
    var formData = new FormData(formElement);
    request.open("POST", ajaxUrl, true);
    request.send(formData);

    
}
