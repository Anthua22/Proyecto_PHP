<?php

use FUTAPP\app\repository\PartidoRepository;
use FUTAPP\core\App;

?>

<b>Designación Partido</b>
<div class="card shadow">

    <h4 class="card-title col" style="margin:10px; ">
        <span><?= App::getRepository(PartidoRepository::class)->getEquipoLocal($partido)->getNombre() ?></span>
        VS
        <?= App::getRepository(PartidoRepository::class)->getEquipoVisitante($partido)->getNombre() ?>
    </h4>

    <div class="card-body row">

        <div class="col">

            <img style="height: 150px; width: 120px;"
                 src="../../images/equipos/<?= App::getRepository(PartidoRepository::class)->getEquipoLocal($partido)->getFoto() ?>"
                 alt=""/>


        </div>
        <div class="col">
            <img style="height: 150px; width: 120px;" class="equipo"
                 src="../../images/equipos/<?= App::getRepository(PartidoRepository::class)->getEquipoVisitante($partido)->getFoto() ?>"
                 alt=""/>


        </div>


    </div>
    <div class="card-footer">
        <div class="row">
            <div class="col">Arbitro:</div>
            <div class="col"><?= App::getRepository(PartidoRepository::class)->getArbitro($partido)->getNombre() . ' ' . App::getRepository(PartidoRepository::class)->getArbitro($partido)->getApellidos() ?></div>

        </div>
        <div class="row">
            <div class="col">Dirección:</div>
            <div class="col"><?= $partido->getDireccionEncuentro() ?></div>
        </div>
        <div class="row">
            <div class="col">Fecha:</div>
            <div class="col"><?= $partido->getFecha()?></div>
        </div>
        <div class="row">
            <div class="col">Hora:</div>
            <div class="col"><?= $partido->getHoraCompleta() ?></div>
        </div>

    </div>

</div>