<?php require __DIR__ . '/partials/cabecera.view.part.php' ?>

<div class="main">
    <div class="shop_top">
		<div class="container">

                <div class="row">
                    <?php
                    foreach ($equipos as $equipo):?>
                    <div class="col-md-3 shop_box" style="margin-top: 20px;">
                        <a href="single.html">
                            <img src="../images/equipos/<?= $equipo->getFoto()?>"  class="img-responsive" alt=""/>
                                <div class="shop_desc">
                                    <h2><a href="#"><?= $equipo->getNombre() ?></a></h2>
                                    <span class="actual" style="font-weight: bold;">Email:</span>
                                    <span class="actual"><?= $equipo->getCorreo()?></span><br>
                                    <span class="actual"  style="font-weight: bold;">Dirección:</span>
                                    <span class="actual"><?= $equipo->getDireccionCampo()?></span>
                                    <ul class="buttons">
                                        <li class="shop_btn"><a href="#">Ver Partidos</a></li>
                                    </ul>
                                </div></a>
                    </div>

                    <?php endforeach; ?>
                </div>

        </div>
   </div>
</div>
<?php require __DIR__.'/partials/footer.view.part.php' ?>