<?php
require_once __DIR__.'/../../core/database/QueryBuilder.php';
require_once __DIR__.'/../entity/Partido.php';


class PartidoRepository extends QueryBuilder
{
    public function __construct()
    {
        parent::__construct('partidos',Partido::class);
    }
}