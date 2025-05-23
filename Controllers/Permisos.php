<?php 
/**
 * Archivo Permisos.php
 * Controlador Permisos
 */
class Permisos extends Controllers
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getPermisosRol(int $idrol)
    {
        $rolid = intval($idrol);

        if($rolid > 0){
            $arrModulos = $this->model->selectModulos();
            $arrPermisosRol = $this->model->selectPermisosRol($rolid);
            $arrPermisosDefault = array('r' => 0, 'w' => 0, 'u' => 0, 'd' => 0);

            // Reorganizar permisos por idmodulo para fácil acceso
            $permisosIndexados = array();
            foreach ($arrPermisosRol as $permiso) {
                $permisosIndexados[$permiso['moduloid']] = array(
                    'r' => $permiso['r'],
                    'w' => $permiso['w'],
                    'u' => $permiso['u'],
                    'd' => $permiso['d']
                );
            }

            // Asignar permisos a cada módulo
            for ($i = 0; $i < count($arrModulos); $i++) {
                $idModulo = $arrModulos[$i]['idmodulo'];
                if (isset($permisosIndexados[$idModulo])) {
                    $arrModulos[$i]['permisos'] = $permisosIndexados[$idModulo];
                } else {
                    $arrModulos[$i]['permisos'] = $arrPermisosDefault;
                }
            }

            //$arrPermisosRol['modulos'] = $arrModulos;
            // Construir correctamente el array que se le pasa al modal
            $data = [
                'modulos' => $arrModulos,
                'idrol'   => $rolid
            ];
            $html = getModal("modalPermisos", $data);
            //dep($arrModulos); 
        }
        die();
    }

    //Método para activar los permios de un rol
    public function setPermisos()
    {
        dep($_POST);
        die();
    }
}
?>
