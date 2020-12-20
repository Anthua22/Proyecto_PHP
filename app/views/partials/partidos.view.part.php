<div class="card-columns mt-4 mb-4">
    <?php use FUTAPP\app\repository\PartidoRepository;
    use FUTAPP\core\App;

    foreach ($partidos

             as $partido): ?>
        <div class="card shadow">
            <h4 class="card-title col" style="text-align: center; "><a
                        href="/equipos/<?= App::getRepository(PartidoRepository::class)->getEquipoLocal($partido)->getId() ?>"><?= App::getRepository(PartidoRepository::class)->getEquipoLocal($partido)->getNombre() ?></a>
                VS
                <a href="/equipos/<?= App::getRepository(PartidoRepository::class)->getEquipoVisitante($partido)->getId() ?>"> <?= App::getRepository(PartidoRepository::class)->getEquipoVisitante($partido)->getNombre() ?></a>
            </h4>

            <div class="card-body row">

                <div class="col">
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
                    <div class="col"><?= $partido->getFecha() ?></div>
                </div>
                <div class="row">
                    <div class="col">Hora:</div>
                    <div class="col"><?= $partido->getHoraCompleta() ?></div>
                </div>

                <?php if(!is_null($usuario)): ?>
                <?php if($usuario->getRole() !== 'admin' && $usuario->getId() === $partido->getArbitro()):?>
                <div style="text-align: center; margin-top: 5px;">
                    <a href="/partidos/<?= $partido->getId() ?>" class="btn btn-danger">No asistir</a>
                </div>
                <?php elseif($usuario->getRole()==='admin'):?>
                <div style="text-align: center; margin-top: 5px;">
                    <a href="/partidos/<?= $partido->getId() ?>" class="btn btn-danger">Borrar</a>
                </div>
                <?php endif;?>
                <?php endif;?>


            </div>

        </div>

    <?php endforeach; ?>

    <script src="public/js/asistencia.js"></script>
</div>