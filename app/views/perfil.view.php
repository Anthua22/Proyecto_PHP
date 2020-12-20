<div class="main">
    <div class="shop_top">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="map">
                        <img src="<?= $_usuario->getPathFoto() ?>" style="max-width: 500px;">
                    </div>
                </div>
                <div class="col-md-5">
                    <p style="font-weight: bold; font-size: 30px">Nombre:</p>

                    <p style="font-size: 20px"><?= $_usuario->getNombre() . ' ' . $_usuario->getApellidos() ?></p>
                    <p style="font-weight: bold; font-size: 30px">Teléfono:</p>
                    <p style="font-size: 20px"><?= $_usuario->getTelefono() ?></p>
                    <p style="font-weight: bold; font-size: 30px">Email:</p>
                    <p style="font-size: 20px"><?= $_usuario->getEmail() ?></p>

                    <?php if ($_usuario->getId() === $usuario->getId() || $usuario->getRole() === 'admin'): ?>
                        <p style="font-weight: bold; font-size: 30px">Editar Perfil:</p>
                        <a href="/arbitros/<?= $_usuario->getId() ?>/update" class="btn btn-info">
                            Cambiar Datos
                        </a>

                        <a href="/arbitros/<?= $_usuario->getId() ?>/updatepass" class="btn btn-info">
                            Cambir Contraseña
                        </a>

                        <?php if ($usuario->getRole() === 'admin' && $usuario->getRole() !== $_usuario->getRole() && $_usuario->getId() !== $usuario->getId()): ?>

                            <a href="/arbitros/<?= $_usuario->getId() ?>" class="btn btn-danger btn-lg"
                               style="margin-left: 100px;">
                                <span class="glyphicon glyphicon-trash"></span>
                            </a>
                        <?php endif; ?>
                    <?php endif; ?>

                    <script src="/public/js/deleteUser.js"></script>


                </div>
            </div>


        </div>
    </div>
</div>