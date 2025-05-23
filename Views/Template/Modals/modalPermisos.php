<!-- Modal Permisos Roles -->
<div class="modal fade modalPermisos" id="modalPermisos" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title h4">Permisos Roles de Usuraios</h5>
       <button type="button" class="close" onclick="$('#modalPermisos').modal('hide')" aria-label="Close">
        <span aria-hidden="true">×</span>
      </button>
      </div>
      <!--Contenido del modal-->
      <div class="modal-body">
        <div class="col-md-12">
          <div class="tile">
            <form action="" id="formPermisos" name="formPermisos">
              <input type="hidden" id="idrol" name="idrol" value="<?php echo $data['idrol']; ?>">
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Módulo</th>
                      <th class="text-center">Ver</th>
                      <th class="text-center">Crear</th>
                      <th class="text-center">Actualizar</th>
                      <th class="text-center">Eliminar</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                      $no = 1;
                      $modulos = $data['modulos'];
                      for($i = 0; $i < count($modulos); $i++)
                      {
                        $permisos = $modulos[$i]['permisos'];
                        $rCheck = $permisos['r'] == 1 ? "cheked " : "";
                        $wCheck = $permisos['r'] == 1 ? "cheked " : "";
                        $uCheck = $permisos['r'] == 1 ? "cheked " : "";
                        $dCheck = $permisos['r'] == 1 ? "cheked " : "";
                        $idmod = $modulos[$i]['idmodulo'];
                      
                     ?>
                    <tr>
                      <td>
                        <?= $no ?>
                        <input type="hidden" name="modulos[<?= $i ?>][idmodulo]" value="<?= $idmod ?>" required>
                      </td>
                      <td>
                        <?= $modulos[$i]['titulo']; ?>
                      </td>
                      <td class="text-center">
                        <input type="checkbox" name="modulos[<?= $i; ?>][r]" <?= $rCheck ?> />
                      </td>
                      <td class="text-center">
                        <input type="checkbox" name="modulos[<?= $i; ?>][w]" <?= $wCheck ?> />
                      </td>
                      <td class="text-center">
                        <input type="checkbox" name="modulos[<?= $i; ?>][u]" <?= $uCheck ?> />
                      </td>
                      <td class="text-center">
                        <input type="checkbox" name="modulos[<?= $i; ?>][d]" <?= $dCheck ?> />
                      </td>
                    </tr>
                    <?php $no++;
                    } 
                    ?>
                  </tbody>
                </table>
              </div>
              <div class="text-center">
                <button class="btn btn-success" type="button" onclick="fntSavePermisos(event)">Guardar</button>
                <button class="btn btn-danger" type="button" onclick="$('#modalPermisos').modal('hide')">Cancelar</button>

              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>