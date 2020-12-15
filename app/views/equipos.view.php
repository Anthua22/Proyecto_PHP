
<div class="main">
    <div class="shop_top">
		<div class="container">
            <h3 class="m_2">Equipos de la Competición</h3>
                <div class="card-columns mt-4 mb-4">
                    <?php

                    foreach ($equipos as $equipo):?>
                    <div class="card shadow" >
                        <a href="/equipos/<?=$equipo->getId()?>">
                            <img src="<?= $equipo->getPathFoto()?>"  class="card-img-top" alt=""/>
                                <div class="card-body">
                                    <h2 class="card-title"><a href="/equipos/<?=$equipo->getId()?>"><?= $equipo->getNombre() ?></a></h2>
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
