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
//Nuevo Rol
var formRol = document.querySelector("#formRol");
formRol.onsubmit = function(e){
    e.preventDefault();
    //Variables de las formas usadas
    var strNombre = document.querySelector('#txtNombre').value;
    var strDescripcion = document.querySelector('#txtDescripcion').value;
    var intStatus = document.querySelector('#listStatus').value;
    //Validamos que todos los campos contengan informacion
    if (strNombre == '' || strDescripcion == '' || intStatus == '') 
    {
        swal("Atención", "Todos los campos son obligatorios", "error");
        return false;
    }
}
$('#tableRoles').DataTable();
function openModal()
{
	$('#modalFormRol').modal('show');
}