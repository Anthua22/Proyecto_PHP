<?php

require_once __DIR__.'/../repository/EquiposRepository.php';


$equipoRepository = new EquiposRepository();
$equipos = $equipoRepository->findAll();


require __DIR__.'/../views/equipos.view.php';