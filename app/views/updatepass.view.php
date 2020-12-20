<div class="main">
    <div class="shop_top">
        <div class="container">
            <h3 class="m_2 title">Cambiar Contraseña</h3>
            <div>
                <div class="login-title">
                    <div id="loginbox" class="loginbox">
                        <?php if($error!==''&&!is_null($error)):?>
                            <div class="alert alert-danger" role="alert">
                                <?= 'ERROR: ' . $error . ' ' ?>
                            </div>
                        <?php endif;?>

                        <?php if($info!==''&&!is_null($info)):?>
                            <div class="alert alert-success" role="alert">
                                <?= 'INFO: ' . $info . ' ' ?>
                            </div>
                        <?php endif;?>
                        <form action="" method="post" name="login" id="login-form" enctype="multipart/form-data">
                            <fieldset class="input">



                                <p>
                                    <label for="modlgn_nombre_equipo">Anterior Contraseña</label>
                                    <input id="modlgn_nombre_equipo" type="password" name="passantigua"
                                           class="form-control" required
                                           autocomplete="off">

                                </p>

                                <p>
                                    <label for="modlgn_nombre_equipo">Nueva Contraseña</label>
                                    <input id="modlgn_nombre_equipo" type="password" name="passnueva" required
                                           class="form-control"
                                           autocomplete="off">

                                </p>

                                <p>
                                    <label for="modlgn_nombre_equipo">Confirmar nueva Contraseña</label>
                                    <input id="modlgn_nombre_equipo" type="password" name="passnuevaconfirm"
                                           class="form-control" required
                                           autocomplete="off">

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



