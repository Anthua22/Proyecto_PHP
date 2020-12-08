<?php require './partials/cabecera.view.part.php' ?>
<div class="main">
    <div class="shop_top">
        <div class="container">
            <div>
                <div class="login-title">
                    <h4 class="title">Añadir un Equipo</h4>
                    <div id="loginbox" class="loginbox">
                        <form action="/equiposu" method="post" name="login" id="login-form">
                            <fieldset class="input">
                                <p id="login-form-username">
                                    <label for="modlgn_username">Nombre</label>
                                    <input id="modlgn_username" type="text" name="nombre" class="inputbox" size="18"
                                           autocomplete="off">
                                </p>
                                <p id="login-form-foto">
                                    <label for="modlgn_foto">Foto</label>
                                    <input id="modlgn_foto" type="file" name="foto">
                                </p>

                                <p id="login-form-email">
                                    <label for="modlgn_email">Email</label>
                                    <input id="modlgn_username" type="text" name="correo" class="inputbox" size="18"
                                           autocomplete="off">
                                </p>

                                <p id="login-form-direccion">
                                    <label for="modlgn_direccion">Direccion del campo</label>
                                    <input id="modlgn_direccion" type="text" name="direccion" class="inputbox" size="18"
                                           autocomplete="off">
                                </p>

                                <input type="submit" name="Submit" class="button" value="Añadir">
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
<?php require './partials/footer.view.part.php' ?>