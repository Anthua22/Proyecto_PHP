<?php
namespace FUTAPP\app\repository;

use FUTAPP\app\entity\Equipo;
use FUTAPP\core\database\QueryBuilder;



class EquiposRepository extends QueryBuilder
{
    public function __construct()
    {
        parent::__construct('equipos',Equipo::class);
    }
}