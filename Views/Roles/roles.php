<?php 
  headerAdmi($data); 
  getModal("modalRoles", $data)
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
                <table class="table table-hover table-bordered" id="tableRoles">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Nombre</th>
                      <th>Descripción</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
<?php footerAdmi($data); ?>