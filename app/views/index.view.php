<?php require __DIR__ . '/partials/cabecera.view.part.php' ?>
a
    <div class="main">
        <div class="content-top">
            <h2>Próximos partidos</h2>
            <ul id="flexiselDemo3">
                <li><img src="../../images/board1.jpg"/></li>
                <li><img src="../../images/board2.jpg"/></li>
                <li><img src="../../images/board3.jpg"/></li>
                <li><img src="../../images/board4.jpg"/></li>
                <li><img src="../../images/board5.jpg"/></li>
            </ul>
            <h3>SnowBoard Extreme Series</h3>
            <script type="text/javascript">
                document.addEventListener('DOMContentLoaded',()=>{
                    let ul = document.getElementById('flexiselDemo3');
                    set
                }).load(function () {
                    $("#flexiselDemo3").flexisel({
                        visibleItems: 5,
                        animationSpeed: 1000,
                        autoPlay: true,
                        autoPlaySpeed: 3000,
                        pauseOnHover: true,
                        enableResponsiveBreakpoints: true,
                        responsiveBreakpoints: {
                            portrait: {
                                changePoint: 480,
                                visibleItems: 1
                            },
                            landscape: {
                                changePoint: 640,
                                visibleItems: 2
                            },
                            tablet: {
                                changePoint: 768,
                                visibleItems: 3
                            }
                        }
                    });

                });
            </script>
            <script type="text/javascript" src="../../js/jquery.flexisel.js"></script>
        </div>
    </div>

    <div class="features">
        <div class="container">
            <h3 class="m_3">Partidos Anteriores</h3>

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
                            <a href="/equipos/<?= App::getRepository(PartidoRepository::class)->getEquipoLocal($partido)->getId() ?>">
                                <img style="height: 150px; width: 120px;"
                                     src="../../images/equipos/<?= App::getRepository(PartidoRepository::class)->getEquipoLocal($partido)->getFoto() ?>"
                                     alt=""/>

                            </a>

                        </div>
                        <div class="col">
                            <a href="/equipos/<?= App::getRepository(PartidoRepository::class)->getEquipoVisitante($partido)->getid() ?>">
                                <img style="height: 150px; width: 120px;" class="equipo"
                                     src="../../images/equipos/<?= App::getRepository(PartidoRepository::class)->getEquipoVisitante($partido)->getFoto() ?>"
                                     alt=""/>
                            </a>

                        </div>



                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col">Arbitro:</div>
                            <div class="col"><?= App::getRepository(PartidoRepository::class)->getArbitro($partido)->getNombre().' '.App::getRepository(PartidoRepository::class)->getArbitro($partido)->getApellidos()?></div>

                        </div>
                        <div class="row">
                            <div class="col">Dirección:</div>
                            <div class="col"><?= $partido->getDireccionEncuentro()?></div>
                        </div>
                        <div class="row">
                            <div class="col">Fecha:</div>
                            <div class="col"><?= $partido->getFecha()?></div>
                        </div>
                        <div class="row">
                            <div class="col">Hora:</div>
                            <div class="col"><?= $partido->getHoraCompleta()?></div>
                        </div>
                        <div class="row">
                            <div class="col">Resultado:</div>
                            <div class="col"><?= $partido->getResultado()?></div>
                        </div>
                    </div>

                </div>

                <?php endforeach; ?>
            </div>

        </div>
    </div>
<?php require __DIR__ . '/partials/footer.view.part.php' ?>