<?php 
headerTienda($data);
$banner = $data['page']['portada'];
$idpagina = $data['page']['idpost'];
 ?>
<script>
  document.querySelector('header').classList.add('header-v4');
</script>

 <section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url(<?= $banner ?>);">
  <h2 class="ltext-105 cl0 txt-center">
    <?= $data['page']['titulo'] ?>
  </h2>
</section>

<section class="py-5 text-center">
  <div class="container">
    <p>Visítanos y obtén los mejores precios del mercado, cualquier artículo que necesites para estar mejor prevenido</p>
    <a class="btn btn-info" href="<?= base_url(); ?>/tienda">VER PRODUCTOS</a>
  </div>
</section>

<div class="py-5 bg-light">
  <div class="container">
    <div class="row">

      <!-- Tienda 1 -->
      <div class="col-md-4">
        <div class="card mb-4 box-shadow hov-img0">
          <img
            src="<?= media(); ?>/tienda/images/tiendas/tienda1.png"
            alt="Tienda Uno"
            style="width:100%; height:auto;"
          />
          <div class="card-body">
            <p class="card-text">
              Tienda ubicada cerca del parque ecoturístico Dos Aguas, ideal para probar nuestros equipos en campo abierto
            </p>
            <p>
              Dirección: San Rafael, Tlalmanalco, México<br/>
              Teléfono: 5979755255<br/>
              Correo: info_sanrafael@exintoresrgc.com
            </p>
          </div>
        </div>
      </div>

      <!-- Tienda 2 -->
      <div class="col-md-4">
        <div class="card mb-4 box-shadow hov-img0">
          <img
            src="<?= media(); ?>/tienda/images/tiendas/tienda2.png"
            alt="Tienda Dos"
            style="width:100%; height:auto;"
          />
          <div class="card-body">
            <p class="card-text">
              Ubicada cerca del metro Villa de Aragón, es una excelente ubicación para adquirir equipos, sin salir de la ciudad.
            </p>
            <p>
              Dirección: Gustavo A. Madero, CDMX<br/>
              Teléfono: 5512345678<br/>
              Correo: info_gam@exintoresrgc.com
            </p>
          </div>
        </div>
      </div>

      <!-- Tienda 3 -->
      <div class="col-md-4">
        <div class="card mb-4 box-shadow hov-img0">
          <img
            src="<?= media(); ?>/tienda/images/tiendas/tienda3.png"
            alt="Tienda Tres"
            style="width:100%; height:auto;"
          />
          <div class="card-body">
            <p class="card-text">
              Tienda ubicada en Chalco, es ideal para personas que llegan por la autopista México – Puebla
            </p>
            <p>
              Dirección: Chalco, México<br/>
              Teléfono: 5587654321<br/>
              Correo: info_chalco@exintoresrgc.com
            </p>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>

<?php
  if(viewPage($idpagina)){
    echo $data['page']['contenido'];
  }else{
  ?>
<div>
  <div class="container-fluid py-5 text-center" >
    <img src="<?= media() ?>/images/construction.png" alt="En construcción">
    <h3>Estamos trabajando para usted.</h3>
  </div>
</div>
<?php 
  }
  footerTienda($data);
?>