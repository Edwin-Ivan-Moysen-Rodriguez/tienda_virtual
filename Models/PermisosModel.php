<?php 
/**
 * PermisosModel.php
 * Archivo encargado de la creacion del modelo Permisos
 */
class permisosModel extends Mysql
{
    public $intPermiso;
    public $intRolid;
    public $intModuloid;
    public $r; // Leer
    public $w; // Escribir
    public $u; // Actualizar
    public $d; // Eliminar

    public function __construct()
    {
        parent::__construct();
    }

    public function selectModulos()
    {
        $sql = "SELECT * FROM modulo WHERE status != 0";
        $request = $this->select_all($sql);
        return $request;
    }

    public function selectPermisosRol(int $idrol)
    {
        $this->intRolid = $idrol;
        $sql = "SELECT * FROM permisos WHERE rolid = $this->intRolid";
        $request = $this->select_all($sql);
        return $request;
    }
}
?>
