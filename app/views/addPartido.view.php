<?php require __DIR__ . '/partials/cabecera.view.part.php'; ?>
    <div class="main">
        <div class="shop_top">
            <div class="container">
                <h3 class="m_2 title">Asignar Partido</h3>
                <div >
                    <div class="login-title">
                        <div id="loginbox" class="loginbox">
                            <form action="" method="post" name="login" id="login-form">
                                <fieldset class="input">
                                    <p id="login-form-username">
                                        <label for="modlgn_username">Equipo Local</label>
                                        <select name="equiposlocales" class="form-control">
                                            <option value="-1">Seleccionar Equipo Local</option>
                                            <?php foreach ($equipos as $equipo): ?>
                                                <option value="<?= $equipo->getId() ?>">

                                                    <?= $equipo->getNombre() ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </p>
                                    <p id="login-form-password">
                                        <label for="modlgn_username">Equipo Visitante</label>
                                        <select name="equiposlocales" class="form-control">
                                            <option value="-1">Seleccionar Equipo Visitante</option>
                                            <?php foreach ($equipos as $equipo): ?>
                                                <option value="<?= $equipo->getId() ?>">

                                                    <?= $equipo->getNombre() ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </p>
                                    <p id="login-form-password">
                                        <label for="modlgn_username">Arbitro</label>
                                        <select name="equiposlocales" class="form-control">
                                            <option value="-1">Seleccionar Arbitro</option>
                                            <?php foreach ($arbitros as $arbitro): ?>
                                                <option value="<?= $arbitro->getId() ?>">
                                                    <?= $arbitro->getNombre() . ' ' . $arbitro->getApellidos() ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </p>
                                    <p id="login-form-direccion">
                                        <label for="modlgn_direccion">Direccion del encuentro</label>
                                        <input id="modlgn_direccion" type="text" name="direccion"
                                               size="18" class="form-control"
                                               autocomplete="off">
                                    </p>
                                    <p id="login-form-fecha">
                                        <label for="modlgn_fecha">Fecha del encuentro</label>
                                        <input id="modlgn_fecha" type="date" name="fecha" size="18"
                                               autocomplete="off">
                                    </p>
                                    <p id="login-form-hora">
                                        <label for="modlgn_hora">Hora del encuentro</label>
                                    <div>
                                        <input id="modlgn_hora" type="number" name="hora" placeholder="00" size="18"
                                               autocomplete="off">
                                        <span>:</span>
                                        <input id="modlgn_minuto" type="number" placeholder="00" name="minuto" size="18"
                                               autocomplete="off">
                                    </div>

                                    </p>
                                    <input type="submit" name="Submit" class="button" value="Asignar">
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
<?php require __DIR__ . '/partials/footer.view.part.php';