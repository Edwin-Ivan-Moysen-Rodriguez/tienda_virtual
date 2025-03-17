<!-- Modal Roles -->
<div class="modal fade" id="modalFormRol" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header headerRegister">
        <h5 class="modal-title" id="titleModal">Nuevo Rol</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="tile">
            <div class="tile-body">
              <form id="formRol" name="formRol">
                <input type="hidden" id="idRol" name="idRol" value="">
                <div class="form-group">
                  <label class="form-label">Nombre</label>
                  <input class="form-control" id="txtNombre" name="txtNombre" type="text" placeholder="Nombre del rol" required>
                </div>
                <div class="form-group">
                  <label class="form-label">Descripción</label>
                  <textarea class="form-control" id="txtDescripcion" name="txtDescripcion" rows="2" placeholder="Descripción del rol" required></textarea>
                </div>
                <div class="form-group">
                    <label class="form-label" for="exampleSelect1">Estado</label>
                    <select class="form-control" id="listStatus" name="listStatus" required>
                      <option value="1">Activo</option>
                      <option value="2">Inactivo</option>
                    </select>
                </div>
                <div class="tile-footer">
                  <button id="btnActionForm" class="btn btn-primary" type="submit"><i class="bi bi-check-circle-fill me-2"></i><span id="btnText">Guardar</span></button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="#" data-dismiss="modal"><i class="bi bi-x-circle-fill me-2"></i>Cancelar</a>
                </div>
              </form>
            </div>
          </div>
      </div>
    </div>
  </div>
</div>
<!-- Modal Permisos Roles -->
<div class="modal fade modalPermisos" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title h4">Permisos Roles de Usuraios</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">X</span>
        </button>
      </div>
      <!--Contenido del modal-->
      <div class="modal-body">
        <div class="col-md-12">
          <div class="tile">
            <form action="" id="formPermisos" name="formPermisos">
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Módulo</th>
                      <th class="text-center">Leer</th>
                      <th class="text-center">Escribir</th>
                      <th class="text-center">Actualizar</th>
                      <th class="text-center">Eliminar</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Usuario</td>
                      <td class="text-center">
                        <input type="checkbox" />
                      </td>
                      <td class="text-center">
                        <input type="checkbox" />
                      </td>
                      <td class="text-center">
                        <input type="checkbox" />
                      </td>
                      <td class="text-center">
                        <input type="checkbox" />
                      </td>
                      <td class="text-center">
                        <input type="checkbox" />
                      </td>
                      <td class="text-center">
                        <input type="checkbox" />
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="text-center">
                <button class="btn btn-success" type="button">Guardar</button>
                <button class="btn btn-danger" type="button">Cancelar</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>