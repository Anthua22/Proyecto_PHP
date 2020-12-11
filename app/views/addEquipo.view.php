<?php require __DIR__.'/partials/cabecera.view.part.php' ?>
<div class="main">
    <div class="shop_top">
        <div class="container">
            <div>
                <div class="login-title">
                    <h3 class="m_2 title">Asignar Partido</h3>  
                    <div id="loginbox" class="loginbox">
                        <form action="/add-equipo" method="post" enctype="multipart/form-data">
                            <fieldset class="input">
                                <p id="login-form-username">
                                    <label for="modlgn_username">Nombre</label>
                                    <input id="modlgn_username" type="text" name="nombreEquipo" class="inputbox" size="18"
                                           autocomplete="off">
                                </p>
                                <p id="login-form-foto">
                                    <label for="modlgn_foto">Foto</label>
                                    <input id="modlgn_foto" type="file" name="imagen">
                                </p>

                                <p id="login-form-email">
                                    <label for="modlgn_email">Email</label>
                                    <input id="modlgn_username" type="text" name="correoEquipo" class="inputbox" size="18"
                                           autocomplete="off">
                                </p>

                                <p id="login-form-direccion">
                                    <label for="modlgn_direccion">Direccion del campo</label>
                                    <input id="modlgn_direccion" type="text" name="direccion" class="inputbox" size="18"
                                           autocomplete="off">
                                </p>

                                <input type="submit" class="button" value="Añadir">
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
<?php require __DIR__.'/partials/footer.view.part.php' ?>