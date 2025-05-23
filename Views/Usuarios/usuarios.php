<?php 
  headerAdmi($data); 
  //getModal("modalRoles", $data)
?>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="app-menu__iconbi bi-check2-square"> </i><?php echo $data['page_title'] ?>
            <button class="btn btn-primary" type="button" onclick="openModal();"><i class="bi bi-plus"></i> Nuevo</button>
          </h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="bi bi-house-door fs-6"></i></li>
          <li class="breadcrumb-item"><a href="<?php base_url(); ?>"><?php echo $data['page_title'] ?></a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <div class="table-responsive">
                <table class="table table-hover table-bordered" id="tableUsuarios">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Nombres</th>
                      <th>Apellidos</th>
                      <th>Email</th>
                      <th>Teléfono</th>
                      <th>Rol</th>
                      <th>Status</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1234</td>
                      <td>Edwin Ivan</td>
                      <td>Moysen Rodriguez</td>
                      <td>edwin_mr1977@outlook.com</td>
                      <td>5624807643</td>
                      <td>Administrados</td>
                      <td>Activo</td>
                      <td></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
<?php footerAdmi($data); ?>
