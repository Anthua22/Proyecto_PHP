<div class="main">
    <div class="shop_top">
        <div class="container">
            <div>
                <div class="login-title">
                    <h3 class="m_2 title">Añadir un Equipo a la competición</h3>
                    <div id="loginbox" class="loginbox">
                        <form action="/add-equipo" method="post" id="form" enctype="multipart/form-data">
                            <fieldset class="input">
                                <?php if ($error_addEquipo !== '' || $success_EquipoInsert !== ''): ?>
                                    <?php if ($error_addEquipo !== ''): ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?= 'ERROR: ' . $error_addEquipo . ' ' ?>
                                        </div>
                                    <?php else: ?>
                                        <div class="alert alert-success" role="alert">
                                            <?= $success_EquipoInsert ?>
                                        </div>
                                    <?php endif; ?>
                                <?php endif; ?>
                                <p id="login-form-username">
                                    <label for="modlgn_username">Nombre</label>
                                    <input id="modlgn_username" type="text" name="nombreEquipo" class="inputbox"
                                           size="18"
                                           required
                                           autocomplete="off">
                                </p>
                                <p id="login-form-foto">
                                    <label for="modlgn_foto">Foto</label>
                                    <input id="modlgn_foto" type="file" name="image" required>
                                </p>
                                <p>
                                    <img src="" id="imgPreview" style="display: none;"/>
                                </p>
                                <p id="login-form-email">
                                    <label for="modlgn_email">Email</label>
                                    <input id="modlgn_username" type="email" name="correoEquipo" class="inputbox"
                                           size="18"
                                           required
                                           autocomplete="off">
                                </p>

                                <p id="login-form-direccion">
                                    <label for="modlgn_direccion">Direccion del campo</label>
                                    <input id="modlgn_direccion" type="text" name="direccion" class="inputbox" size="18"
                                           required
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

