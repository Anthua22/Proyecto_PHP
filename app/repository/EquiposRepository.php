<?php


require_once __DIR__.'/../../core/database/QueryBuilder.php';
require_once __DIR__.'/../entity/Equipo.php';

class EquiposRepository extends QueryBuilder
{
    public function __construct()
    {
        parent::__construct('equipos',Equipo::class);
    }
}