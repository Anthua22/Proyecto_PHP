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
                    <?php if($_usuario->getId() === $usuario->getId() || $usuario->getRole()==='admin'):?>

                    <a href="/arbitros/<?= $_usuario->getId() ?>/update" class="btn btn-info btn-lg">
                        <span class="glyphicon glyphicon-edit"></span>
                    </a>
                    <?php endif;?>

                    <script src="/public/js/equipoDelete.js"></script>


                </div>
            </div>


        </div>
    </div>
</div>