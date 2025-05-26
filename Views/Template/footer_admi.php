    <script>
        const base_url = "<?php echo base_url(); ?>"
    </script>
    <!-- Essential javascripts for application to work-->
    <script src="<?php echo media(); ?>/js/jquery-3.7.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="<?php echo media(); ?>/js/main.js"></script>
    <!-- Importacion del archivo fontawesome.js el cual contiene nuestra librearia de icons -->
    <script src="<?php echo media(); ?>/js/fontawesome.js"></script>
    <!-- Importacion del archivo functions_admi.js para las funciones del administrador-->
    <script src="<?php echo media(); ?>/js/functions_admi.js"></script>
    <!-- Page specific javascripts-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <!-- Data table plugin-->
    <script type="text/javascript" src="<?php echo media(); ?>/js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="<?php echo media(); ?>/js/plugins/dataTables.bootstrap.min.js"></script>
    <?php if($data['page_name'] == "roles"){?>
    <!-- Importacion del archivo functions_roles.js para las funciones del administrador-->
    <script src="<?php echo media(); ?>/js/functions_roles.js"></script>
    <?php } ?>
    <?php if($data['page_name'] == "usuarios"){ ?>
    <!-- Importacion del archivo functions_usuarios.js para las funciones del administrador-->
    <script src="<?php echo media(); ?>/js/functions_usuarios.js"></script>
    <?php } ?>
  </body>
</html>