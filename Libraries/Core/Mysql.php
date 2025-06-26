<?php 
class Mysql extends Conexion
{
    /**
     * La conexión PDO
     * @var PDO
     */
    private $conexion;

    /**
     * Consulta actual
     * @var string
     */
    private string $strquery;

    /**
     * Valores para la consulta preparada
     * @var array
     */
    protected array $arrValues = [];

    public function __construct()
    {
        $this->conexion = (new Conexion())->conect();
    }

    public function insert(string $query, array $arrValues): int
    {
        $this->strquery   = $query;
        $this->arrValues  = $arrValues;
        $stmt = $this->conexion->prepare($this->strquery);
        $ok   = $stmt->execute($this->arrValues);
        return $ok 
            ? intval($this->conexion->lastInsertId()) 
            : 0;
    }

    public function select(string $query): ?array
    {
        $stmt = $this->conexion->prepare($query);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }

    public function select_all(string $query): array
    {
        $stmt = $this->conexion->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update(string $query, array $arrValues): bool
    {
        $this->strquery  = $query;
        $this->arrValues = $arrValues;
        $stmt = $this->conexion->prepare($this->strquery);
        return $stmt->execute($this->arrValues);
    }

    public function delete(string $query): bool
    {
        $stmt = $this->conexion->prepare($query);
        return $stmt->execute();
    }
}
