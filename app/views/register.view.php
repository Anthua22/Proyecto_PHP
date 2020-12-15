<div class="main">
    <div class="shop_top">
        <div class="container">

            <?php if ($error !== ''): ?>

                <div class="alert alert-danger" role="alert">
                    <?= 'ERROR: ' . $error . ' ' ?>
                </div>
            <?php endif; ?>

            <form action="/register" method="post" enctype="multipart/form-data">
                <div style="margin: 10px;">
                    <h3>Información Personal</h3>

                    <div class="row">
                        <div class="col">
                            <span>Nombre<label>*</label></span>
                            <input type="text" name="nombre" class="form-control" style="width: 80%; height: 40px;"
                                   required value="<?= $nombre?>"/>
                        </div>
                        <div class="col">
                            <span>Apellidos<label>*</label></span>
                            <input type="text" name="apellidos" class="form-control"
                                   style="width: 80%; height: 40px;" required value="<?=$apellidos?>"/>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col">
                            <span>Email<label>*</label></span>
                            <input type="email" name="correo" class="form-control" style="width: 80%; height: 40px;" value="<?= $email?>"
                                   required/>
                        </div>
                        <div class="col">
                            <span>Foto<label>*</label></span>
                            <input type="file"  name="foto" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <span>Teléfono<label>*</label></span>
                            <input type="number" class="form-control" name="telefono"  value="<?= $telefono ?>"
                                   style="width: 80%; height: 40px;" maxlength="9" required>
                        </div>
                        <div class="col">
                            <span>Fecha Nacimiento<label>*</label></span>
                            <input type="date" class="form-control" style="width: 80%; height: 40px;"
                                   name="fechanacimiento" value="<?= $fecha ?>" required>

                        </div>
                    </div>
                    <div class="clear"></div>

                </div>
                <div class="clear"></div>
                <div>
                    <h3>Información Login</h3>

                    <div class="row">
                        <div class="col">
                            <span>Contraseña<label>*</label></span>
                            <input type="password" class="form-control" style="width: 80%; height: 40px;"
                                   name="password" required>
                        </div>

                        <div class="col">
                            <span>Confirmar Contraseña<label>*</label></span>
                            <input type="password" class="form-control" style="width: 80%; height: 40px;"
                                   name="passwordconfirm" required>
                        </div>
                    </div>


                    <div class="clear"></div>
                </div>
                <div class="clear"></div>
                <div class="row">

                    <div class="col">
                        <span>Captcha<label>*</label></span>


                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <img src="/image-generate" alt="Captcha"/>
                        <input type="text" name="captcha" class="form-control" style="width:100px; height: 40px; margin-top: 20px;" required/>
                    </div>

                </div>
                <div class="clear"></div>
                <input type="submit" class="btn btn-primary" style="background-color: orange; margin-top: 30px;"
                       value="Registrarse">
            </form>


        </div>
    </div>
</div>