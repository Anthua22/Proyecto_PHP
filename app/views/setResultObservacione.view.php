<?php

use FUTAPP\app\repository\PartidoRepository;
use FUTAPP\core\App;

?>
<div class="container" >
    <div class="row">
        <div class="col">
            <h2 class="card-title col" style="text-align: center; "><a
                        href="/equipos/<?= App::getRepository(PartidoRepository::class)->getEquipoLocal($partido)->getId() ?>"><?= App::getRepository(PartidoRepository::class)->getEquipoLocal($partido)->getNombre() ?></a>
                VS
                <a href="/equipos/<?= App::getRepository(PartidoRepository::class)->getEquipoVisitante($partido)->getId() ?>"> <?= App::getRepository(PartidoRepository::class)->getEquipoVisitante($partido)->getNombre() ?></a>
            </h2>
        </div>
    </div>
    <div class="row">
        <div class="col" style="margin-left:  250px;">
            <a href="/equipos/<?= App::getRepository(PartidoRepository::class)->getEquipoLocal($partido)->getId() ?>">
                <img style="max-height: 160px; max-width: 150px;"
                     src="<?= App::getRepository(PartidoRepository::class)->getEquipoLocal($partido)->getPathFoto() ?>"
                     alt=""/>

            </a>


        </div>
        <div class="col">
            <a href="/equipos/<?= App::getRepository(PartidoRepository::class)->getEquipoVisitante($partido)->getId() ?>">
                <img style="height: 150px; width: 120px;" class="equipo"
                     src="<?= App::getRepository(PartidoRepository::class)->getEquipoVisitante($partido)->getPathFoto() ?>"
                     alt=""/>
            </a>


        </div>
    </div>

    <div style="margin-top: 30px; padding: 20px;">
        <div class="row" style="font-size: 20px; margin-bottom: 10px;">
            <p><span style="font-family: Georgia; font-weight: bold;">Arbitro: </span> <span> <?= App::getRepository(PartidoRepository::class)->getArbitro($partido)->getNombre() . ' ' . App::getRepository(PartidoRepository::class)->getArbitro($partido)->getApellidos() ?></span>
            </p>
        </div>

        <div class="row" style="font-size: 20px;  margin-bottom: 10px;">
            <p><span style="font-family: Georgia; font-weight: bold;">Dirección: </span> <span><?= $partido->getDireccionEncuentro() ?></span></p>
        </div>


        <div class="row" style="font-size: 20px;  margin-bottom: 10px;">
            <p><span style="font-family: Georgia; font-weight: bold;">Fecha: </span> <span><?= $partido->getFechaBD() ?></span></p>
        </div>

        <div class="row" style="font-size: 20px;  margin-bottom: 10px;">
            <p><span style="font-family: Georgia; font-weight: bold;">Hora: </span> <span><?= $partido->getHoraCompletaBD() ?></span></p>
        </div>



        <form method="post" style="margin-bottom: 40px; ">

            <div class="row">
                <label   style="font-size: 20px; font-family: Georgia;  margin-bottom: 10px; font-weight: bold;">Resultado: </label>
            </div>

            <div class="row" style=" margin-bottom: 10px;">

                <input type="number" name="goleslocales" required placeholder="goles locales" style="margin-right: 10px;"/>
                <input type="number" name="golesvisitantes" placeholder="goles visitantes" required/>
            </div>

            <div class="row">
                <label style="font-size: 20px; font-family: Georgia; font-weight: bold;">Observaciones: </label>
            </div>

            <div class="row">
                <textarea name="observaciones" style="width: 300vw"></textarea>
            </div>

            <div class="row">
                <input type="submit" name="Submit" class="btn btn-success btn-md" style="margin-top: 20px;" value="Enviar">
            </div>


        </form>

    </div>

</div>