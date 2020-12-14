<div class="main">
    <div class="shop_top">
        <div class="container">
            <form action="/register" method="post" enctype="multipart/form-data">
                <div style="margin: 10px;">
                    <h3>Información Personal</h3>

                    <div class="row">
                        <div class="col">
                            <span>Nombre<label>*</label></span>
                            <input type="text" name="nombre" class="form-control" style="width: 80%; height: 40px;"
                                   required/>
                        </div>
                        <div class="col">
                            <span>Apellidos<label>*</label></span>
                            <input type="text" name="apellidos" class="form-control"
                                   style="width: 80%; height: 40px;" required/>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col">
                            <span>Email<label>*</label></span>
                            <input type="email" name="correo" class="form-control" style="width: 80%; height: 40px;"
                                   required/>
                        </div>
                        <div class="col">
                            <span>Foto<label>*</label></span>
                            <input type="file" class="form-control" name="foto" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <span>Teléfono<label>*</label></span>
                            <input type="number" class="form-control" name="telefono"
                                   style="width: 80%; height: 40px;" maxlength="9" required>
                        </div>
                        <div class="col">
                            <span>Fecha Nacimiento<label>*</label></span>
                            <input type="date" class="form-control" style="width: 80%; height: 40px;"
                                   name="fechanacimiento" required>

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
                        <img src="/app/controllers/FutAppController.php" alt="Captcha"/>
                        <input type="text" class="form-control" style="width:100px; height: 40px;">

                    </div>
                </div>
                <div class="clear"></div>
                <input type="submit" class="btn btn-primary" style="background-color: orange; margin-top: 30px;"
                       value="Registrarse">
            </form>
        </div>
    </div>
</div>