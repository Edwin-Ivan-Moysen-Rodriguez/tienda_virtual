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

    public function deletePermisos(int $idrol)
    {
        $this->intRolid = $idrol;
        $sql = "DELETE FROM permisos WHERE rolid = $this->intRolid";
        $request = $this->delete($sql);
        return $request;
    }

    public function insertPermisos(int $idrol, int $idmodulo, int $r, int $w, int $u, int $d)
    {
        $return = "";
        $this->intRolid = $idrol;
        $this->intModuloid = $idmodulo;
        $this->r = $r;
        $this->w = $w;
        $this->u = $u;
        $this->d = $d;
        $query_insert = "INSERT INTO permisos(rolid,moduloid,r,w,u,d) VALUES(?,?,?,?,?,?)";
        $arrData = array($this->intRolid, $this->intModuloid, $this->r, $this->w, $this->u, $this->d);
        $request_insert = $this->insert($query_insert, $arrData);
        return $request_insert;
    }
}
?>
