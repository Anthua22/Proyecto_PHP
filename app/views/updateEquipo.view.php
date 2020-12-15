<div class="main">
    <div class="shop_top">
        <div class="container">
            <h3 class="m_2 title">Editar Datos</h3>
            <div>
                <div class="login-title">
                    <div id="loginbox" class="loginbox">
                        <form action="" method="post" name="login" id="login-form" enctype="multipart/form-data">
                            <fieldset class="input">
                                <p id="login-form-username">
                                    <label for="modlgn_nombre_equipo">Nombre</label>
                                    <input id="modlgn_nombre_equipo" type="text" name="nombre" required
                                           size="18" class="form-control"
                                           value="<?= $equipo->getNombre() ?>"
                                           autocomplete="off">
                                </p>
                                <p id="login-form-direccion">
                                    <label for="modlgn_direccion">Direccion del campo</label>
                                    <input id="modlgn_direccion" type="text" name="direccion" required
                                           size="18" class="form-control"
                                           value="<?= $equipo->getDireccionCampo() ?>"
                                           autocomplete="off">
                                </p>
                                <p id="login-form-correo">
                                    <label for="modlgn_correo">Email</label>
                                    <input id="modlgn_correo" type="text" name="correo" required
                                           size="18" class="form-control"
                                           value="<?= $equipo->getCorreo() ?>"
                                           autocomplete="off">
                                </p>

                                <p>
                                    <label for="modlgn_nombre_equipo">Imagen</label>
                                    <input id="modlgn_nombre_equipo" type="file" name="foto"
                                           class="form-control"

                                           autocomplete="off">
                                    <img src="<?= $equipo->getPathFoto() ?>">
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


