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

    public function setPermisos()
    {
        if ($_POST) {
            $intIdrol = intval($_POST['idrol']);
            $modulos = $_POST['modulos'];

            $this->model->deletePermisos($intIdrol);

            $insertados = 0;

            foreach ($modulos as $modulo) {
                $idModulo = $modulo['idmodulo'];
                $r = empty($modulo['r']) ? 0 : 1;
                $w = empty($modulo['w']) ? 0 : 1;
                $u = empty($modulo['u']) ? 0 : 1;
                $d = empty($modulo['d']) ? 0 : 1;

                $res = $this->model->insertPermisos($intIdrol, $idModulo, $r, $w, $u, $d);
                if ($res > 0) {
                    $insertados++;
                }
            }

            if ($insertados > 0) {
                $arrResponse = array('status' => true, 'msg' => 'Permisos asignados correctamente.');
            } else {
                $arrResponse = array('status' => false, 'msg' => 'No se asignaron permisos.');
            }

            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
        die();
    }
}
?>
