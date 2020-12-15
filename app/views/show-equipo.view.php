<div class="main">
    <div class="shop_top">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="map">
                        <img src="<?= $equipo->getPathFoto() ?>" style="max-width: 500px;">
                    </div>
                </div>
                <div class="col-md-5">
                    <p style="font-weight: bold; font-size: 30px">Nombre:</p>

                    <p style="font-size: 20px"><?= $equipo->getNombre() ?></p>
                    <p style="font-weight: bold; font-size: 30px">Dirección del Campo:</p>
                    <p style="font-size: 20px"><?= $equipo->getDireccionCampo() ?></p>
                    <p style="font-weight: bold; font-size: 30px">Email:</p>
                    <p style="font-size: 20px"><?= $equipo->getCorreo() ?></p>
                    <?php if (!is_null($usuario) && $usuario->getRole() === 'admin'): ?>

                        <a href="/equipos/<?= $equipo->getId() ?>/update" class="btn btn-info btn-lg">
                           <span class="glyphicon glyphicon-edit" ></span>
                        </a>
                        <a href="/equipos/<?= $equipo->getId() ?>/delete" class="btn btn-danger btn-lg">
                            <span class="glyphicon glyphicon-trash"></span>
                        </a>

                        <script src="/public/js/deleteEquipo.js"></script>
                    <?php endif; ?>

                </div>
            </div>
            <hr/>
            <h2>Partidos:</h2>
            <div class="row">
                <?php require __DIR__ . '/partials/partidos.view.part.php'; ?>

            </div>
        </div>
    </div>
</div>