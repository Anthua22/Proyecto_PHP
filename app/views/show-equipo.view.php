<?php require __DIR__ . '/partials/cabecera.view.part.php' ?>
    <div class="main">
        <div class="shop_top">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <div class="map">
                            <img src="/../../images/equipos/<?= $equipo->getFoto() ?>">
                        </div>
                    </div>
                    <div class="col-md-5">
                        <p style="font-weight: bold; font-size: 30px">Nombre:</p>

                        <p style="font-size: 20px"><?= $equipo->getNombre() ?></p>
                        <p style="font-weight: bold; font-size: 30px">Dirección del Campo:</p>
                        <p style="font-size: 20px"><?= $equipo->getDireccionCampo() ?></p>
                        <p style="font-weight: bold; font-size: 30px">Email:</p>
                        <p style="font-size: 20px"><?= $equipo->getCorreo() ?></p>
                        <a href="/equipos/<?= $equipo->getId() ?>/update">
                            <button class="btn btn-primary">Editar Datos</button>
                        </a>
                    </div>
                </div>
                <hr/>
                <h2>Partidos:</h2>
                <div class="row">
                    <div class="card-columns mt-4 mb-4">
                        <?php foreach ($partidos

                                       as $partido): ?>
                            <div class="card shadow">
                                <h4 class="card-title col" style="margin:10px; "><a
                                            href="/equipos/<?= App::getRepository(PartidoRepository::class)->getEquipoLocal($partido)->getId() ?>"><?= App::getRepository(PartidoRepository::class)->getEquipoLocal($partido)->getNombre() ?></a>
                                    VS <a href="/equipos/<?= App::getRepository(PartidoRepository::class)->getEquipoVisitante($partido)->getId()?>"> <?= App::getRepository(PartidoRepository::class)->getEquipoVisitante($partido)->getNombre() ?></a>
                                </h4>

                                <div class="card-body row">

                                    <div class="col">
                                        <a href="">
                                            <img style="height: 150px; width: 120px;"
                                                 src="../../images/equipos/<?= App::getRepository(PartidoRepository::class)->getEquipoLocal($partido)->getFoto() ?>"
                                                 alt=""/>

                                        </a>


                                    </div>
                                    <div class="col">
                                        <a href="">
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
                    </div>

                </div>
            </div>
        </div>
    </div>
<?php require __DIR__ . './partials/footer.view.part.php' ?>