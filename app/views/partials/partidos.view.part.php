<div class="card-columns mt-4 mb-4">
    <?php use FUTAPP\app\repository\PartidoRepository;
    use FUTAPP\core\App;

    foreach ($partidos

             as $partido): ?>
        <div class="card shadow">
            <h4 class="card-title col" style="margin:10px; "><a
                        href="/equipos/<?= App::getRepository(PartidoRepository::class)->getEquipoLocal($partido)->getId() ?>"><?= App::getRepository(PartidoRepository::class)->getEquipoLocal($partido)->getNombre() ?></a>
                VS
                <a href="/equipos/<?= App::getRepository(PartidoRepository::class)->getEquipoVisitante($partido)->getId() ?>"> <?= App::getRepository(PartidoRepository::class)->getEquipoVisitante($partido)->getNombre() ?></a>
            </h4>

            <div class="card-body row">

                <div class="col">
                    <a href="/equipos/<?= App::getRepository(PartidoRepository::class)->getEquipoLocal($partido)->getId() ?>">
                        <img style="height: 150px; width: 120px;"
                             src="../../images/equipos/<?= App::getRepository(PartidoRepository::class)->getEquipoLocal($partido)->getFoto() ?>"
                             alt=""/>

                    </a>


                </div>
                <div class="col">
                    <a href="/equipos/<?= App::getRepository(PartidoRepository::class)->getEquipoVisitante($partido)->getId() ?>">
                        <img style="height: 150px; width: 120px;" class="equipo"
                             src="../../images/equipos/<?= App::getRepository(PartidoRepository::class)->getEquipoVisitante($partido)->getFoto() ?>"
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
                <div class="row">
                    <div class="col">Resultado:</div>
                    <div class="col"><?= $partido->getResultado() ?></div>
                </div>
            </div>

        </div>

    <?php endforeach; ?>
    <script>

        function alerta(){
            swal({
                title: "¡ERROR!",
                text: "Esto es un mensaje de error",
                type: "error",
            });
        }
        alerta();
    </script>
</div>