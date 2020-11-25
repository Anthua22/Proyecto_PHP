<?php

$equipoRepository = new \FUTAPP\app\repository\EquiposRepository();

$equipos = $equipoRepository->findAll();

require __DIR__.'/../views/equipos.view.php';