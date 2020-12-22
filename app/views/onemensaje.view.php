<div style="height: 50vh;">
    <div class="shop_top">
        <div class="container">
            <h3 class="m_2 title">Enviar un mensaje a <?= $_usuario->getNombre() .' '. $_usuario->getApellidos()?></h3>
            <div >
                <div class="login-title">
                    <div id="loginbox" class="loginbox">
                        <form method="post" name="login" id="login-form">
                            <?php if (!is_null($mensaje)): ?>
                                <?php if($mensaje!==''):?>
                                    <div class="alert alert-success" role="alert">
                                        <?= $mensaje ?>
                                    </div>
                                <?php endif;?>
                            <?php endif;?>
                            <p id="login-form-direccion">

                                <input id="modlgn_direccion" type="text" name="mensaje" required
                                      class="form-control"

                                       autocomplete="off">

                            </p>

                            <input type="submit" name="Submit" class="btn btn-primary" value="Enviar">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>