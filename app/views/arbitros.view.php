<div class="main">
    <div class="shop_top">
        <div class="container">
            <h3 class="m_2">Arbitros de la Competición</h3>
            <div class="card-colums mt-4 mb-4">

                <?php foreach ($arbitros as $arbitro): ?>
                    <div class="col-md-4 team1" style="margin-top: 20px;">
                        <div class="img_section magnifier2">
                            <a class="fancybox" href="../../public/images/e1.jpg" data-fancybox-group="gallery"
                               title="<?= $arbitro->getNombre() . ' ' . $arbitro->getApellidos() ?>"><img
                                        src="../../public/images/e1.jpg" class="img-responsive" alt=""><span> </span>
                                <div class="img_section_txt">
                                    <?= $arbitro->getNombre() . ' ' . $arbitro->getApellidos() ?>
                                </div>
                            </a></div>
                    </div>

                <?php endforeach; ?>
            </div>

        </div>
    </div>
</div>
