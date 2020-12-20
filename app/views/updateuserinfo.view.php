<div class="main">
    <div class="shop_top">
        <div class="container">
            <h3 class="m_2 title">Editar Datos</h3>
            <div>
                <div class="login-title">
                    <div id="loginbox" class="loginbox">
                        <?php if($error!==''&&!is_null($error)):?>
                            <div class="alert alert-danger" role="alert">
                                <?= 'ERROR: ' . $error . ' ' ?>
                            </div>
                        <?php endif;?>
                        <form action="" method="post" name="login" id="login-form" enctype="multipart/form-data">
                            <fieldset class="input">

                                <p id="login-form-username">
                                    <label for="modlgn_nombre_equipo">Nombre</label>
                                    <input id="modlgn_nombre_equipo" type="text" name="nombre" required
                                           size="18" class="form-control"
                                           value="<?= $_usuario->getNombre()?>"
                                           autocomplete="off">
                                </p>
                                <p id="login-form-username">
                                    <label for="modlgn_nombre_equipo">Apellidos</label>
                                    <input id="modlgn_nombre_equipo" type="text" name="apellidos" required
                                           size="18" class="form-control"
                                           value="<?= $_usuario->getApellidos()?>"
                                           autocomplete="off">
                                </p>
                                <p id="login-form-direccion">
                                    <label for="modlgn_direccion">Telefono</label>
                                    <input id="modlgn_direccion" type="text" name="telefono" required
                                           size="18" class="form-control"
                                           value="<?= $_usuario->getTelefono() ?>"
                                           autocomplete="off">
                                </p>
                                <p id="login-form-correo">
                                    <label for="modlgn_correo">Email</label>
                                    <input id="modlgn_correo" type="text" name="correo" required
                                           size="18" class="form-control"
                                           value="<?= $_usuario->getEmail() ?>"
                                           autocomplete="off">
                                </p>

                                <p id="login-form-correo">
                                    <label for="modlgn_correo">Rol</label>
                                    <?php if($usuario->getRole()==='admin' && $usuario->getId()!==$_usuario->getId()):?>
                                    <select class="form-control" name="role">
                                        <option value="0"><?= $_usuario->getRole()?></option>
                                        <option value="1">admin</option>
                                    </select>
                                    <?php else:?>
                                        <select class="form-control" name="role" disabled>
                                            <option value="0"><?= $_usuario->getRole()?></option>
                                            <option value="1">admin</option>
                                        </select>
                                    <?php endif;?>
                                </p>

                                <p>
                                    <label for="modlgn_nombre_equipo">Imagen</label>
                                    <input id="modlgn_nombre_equipo" type="file" name="foto"
                                           class="form-control"
                                           autocomplete="off">
                                    <img style="margin-top: 20px;" src="<?= $usuario->getPathFoto() ?>">
                                </p>

                                <input type="submit" name="Submit" class="btn btn-primary" value="Editar">
                                <div class="clear"></div>

                            </fieldset>
                        </form>
                    </div>
                </div>
                <div class="clear"></div>
            </div>

        </div>
    </div>
</div>


