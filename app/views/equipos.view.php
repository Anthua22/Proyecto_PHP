<div class="main">
    <div class="shop_top">
        <div class="container">
            <h3 class="m_2">Equipos de la Competición</h3>
            <div class="card-columns mt-4 mb-4">
                <?php

                foreach ($equipos as $equipo):?>
                    <div class="card shadow">
                        <a href="/equipos/<?= $equipo->getId() ?>">
                            <img src="<?= $equipo->getPathFoto() ?>" class="card-img-top" alt=""/>
                            <div class="card-body">
                                <h2 class="card-title"><a
                                            href="/equipos/<?= $equipo->getId() ?>"><?= $equipo->getNombre() ?></a>
                                </h2>
                                <span class="actual" style="font-weight: bold;">Email:</span>
                                <span class="actual"><?= $equipo->getCorreo() ?></span><br>
                                <span class="actual" style="font-weight: bold;">Dirección:</span>
                                <span class="actual"><?= $equipo->getDireccionCampo() ?></span>
                                <?php if (!is_null($usuario) && $usuario->getRole() === 'admin'): ?>

                                    <a href="/equipos/<?= $equipo->getId() ?>" class="btn btn-danger btn-lg"
                                       style="margin-left: 100px;">
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </a>

                                    <script src="/public/js/equiposDelete.js"></script>
                                <?php endif; ?>
                            </div>
                        </a>

                    </div>

                <?php endforeach; ?>
            </div>

        </div>
    </div>
</div>
