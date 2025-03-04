<?php headerAdmi($data); ?>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="app-menu__iconbi bi-check2-square"> </i><?php echo $data['page_title'] ?>
            <button class="btn btn-primary" type="button"><i class="bi bi-plus"></i> Nuevo</button>
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
            <div class="tile-body">Roles de usuario</div>
          </div>
        </div>
      </div>
    </main>
<?php footerAdmi($data); ?>