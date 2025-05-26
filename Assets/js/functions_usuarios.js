// Función para abrir el modal
function openModal()
{
	document.querySelector('#idUsuario').value = "";
	document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegistrer");
	document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");
	document.querySelector('#btnText').innerHTML = "Guardar";
	document.querySelector('titleModal').innerHTML = "Nuevo Usuario";
	document.querySelector("#formUsuario").reset();
	$('#modalFormUsuarios').modal('show');
}