<?php
namespace FUTAPP\app\repository;

use FUTAPP\app\entity\Equipo;
use FUTAPP\app\entity\Partido;
use FUTAPP\core\database\QueryBuilder;
use PDO;


class EquiposRepository extends QueryBuilder
{
    public function __construct()
    {
        parent::__construct('equipos',Equipo::class);
    }

    public function getAllPartidosEquipo(string $id):array{

        $sql = "select * from partidos where equipoLocal = ".$id." or equipoVisitante = ".$id;

        $pdoStatement = $this->getConnection()->prepare($sql);
        $pdoStatement->execute();
        return $pdoStatement->fetchAll(PDO::FETCH_CLASS, Partido::class);
    }


}