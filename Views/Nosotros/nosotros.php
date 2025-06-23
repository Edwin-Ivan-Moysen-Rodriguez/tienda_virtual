<?php 
headerTienda($data);
$banner   = $data['page']['portada'];
$idpagina = $data['page']['idpost'];
?>
<script>
  document.querySelector('header').classList.add('header-v4');
</script>

<!-- Banner / Título -->
<section class="bg-img1 txt-center p-lr-15 p-tb-92" 
         style="background-image: url(<?= $banner ?>);">
  <h2 class="ltext-105 cl0 txt-center">
    <?= $data['page']['titulo'] ?>
  </h2>
</section>

<?php if(viewPage($idpagina)): ?>

  <!-- Contenido genérico de la página (si lo tuvieras) -->
  <?= $data['page']['contenido'] ?>

  <!-- Sección Historia -->
  <section class="bg0 p-t-75 p-b-120">
    <div class="container">
      <div class="row p-b-148">
        <div class="col-md-7 col-lg-8">
          <div class="p-t-7 p-r-85 p-r-15-lg p-r-0-md">
            <h3 class="mtext-111 cl2 p-b-16">Historia</h3>
            <p class="stext-113 cl6 p-b-26">
              Hace años, el oficial de policía Cornelio Rodríguez advirtió la necesidad urgente 
              de contar con equipos contra incendios fiables en cada intervención. Motivado por 
              salvar vidas, fundó Extinguidores RGC, una empresa comprometida con dotar a cuerpos 
              de emergencia y comunidades de herramientas de primera calidad.
            </p>
          </div>
        </div>
        <div class="col-11 col-md-5 col-lg-4 m-lr-auto">
          <div class="how-bor1">
            <div class="hov-img0">
              <img src="<?= base_url(); ?>/Assets/tienda/images/nosotros/cornelio-rodriguez.jpg"
                   alt="Cornelio Rodríguez"
                   class="w-full h-auto" />
            </div>
          </div>
        </div>
      </div>

      <!-- Sección Misión -->
      <div class="row">
        <div class="order-md-2 col-md-7 col-lg-8 p-b-30">
          <div class="p-t-7 p-l-85 p-l-15-lg p-l-0-md">
            <h2 class="mtext-111 cl2 p-b-16">
              <span style="color: #236fa1;">Nuestra Misión</span>
            </h2>
            <p class="stext-113 cl6 p-b-26">
              En Extinguidores RGC buscamos consolidarnos como líderes en México, ofreciendo productos 
              y capacitación continua para garantizar la seguridad de la ciudadanía. Nuestra meta es que 
              cada comunidad y cuerpo de emergencia encuentre en nuestros extintores un aliado confiable 
              contra cualquier conato de fuego.
            </p>

            <div class="bor16 p-l-29 p-b-9 m-t-22">
              <p class="stext-114 cl6 p-r-40 p-b-11">
                “Compromiso y valentía en cada extinción, orgullo de proteger a México.”
              </p>
              <span class="stext-111 cl8">– Extinguidores RGC</span>
            </div>
          </div>
        </div>
        <div class="order-md-1 col-11 col-md-5 col-lg-4 m-lr-auto p-b-30">
          <div class="how-bor2">
            <div class="hov-img0">
              <img src="<?= base_url(); ?>/Assets/tienda/images/nosotros/mision-rgc.jpg"
                   alt="Nuestra misión RGC"
                   class="w-full h-auto" />
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

<?php else: ?>
  <div class="container-fluid py-5 text-center">
    <img src="<?= media() ?>/images/construction.png" alt="En construcción">
    <h3>Estamos trabajando para usted.</h3>
  </div>
<?php endif; ?>

<?php footerTienda($data); ?>
