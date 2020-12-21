
    <div class="main">
        <div class="shop_top">
            <div class="container">
                <h3 class="m_2 title">Asignar Partido</h3>
                <div >
                    <div class="login-title">
                        <div id="loginbox" class="loginbox">
                            <form action="/add-partido" method="post" name="login" id="login-form">
                                <fieldset class="input">
                                    <?php if ($error_addPartido !== '' || $success_partidoInsert !== ''): ?>
                                        <?php if ($error_addPartido !== ''): ?>
                                            <div class="alert alert-danger" role="alert">
                                                <?= 'ERROR: ' . $error_addPartido . ' ' ?>
                                            </div>
                                        <?php else: ?>
                                            <div class="alert alert-success" role="alert">
                                                <?= $success_partidoInsert ?>
                                            </div>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                    <p id="login-form-equipolocal">
                                        <label for="modlgn_equipolocal">Equipo Local</label>
                                        <select name="equiposlocales" class="form-control" required>
                                            <option value="-1" >Seleccionar Equipo Local</option>
                                            <?php foreach ($equipos as $equipo): ?>
                                                <option value="<?= $equipo->getId() ?>"
                                                    <?= ($equipolocalSeleccionado===$equipo->getId().'') ? 'selected' : ''?>>

                                                    <?= $equipo->getNombre() ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </>
                                    <p id="login-form-equiposvisitatnes">
                                        <label for="modlgn_username">Equipo Visitante</label>
                                        <select name="equiposvisitantes" class="form-control" required>
                                            <option value="-1">Seleccionar Equipo Visitante</option>
                                            <?php foreach ($equipos as $equipo): ?>
                                                <option value="<?= $equipo->getId() ?>">

                                                    <?= $equipo->getNombre() ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </p>
                                    <p id="login-form-arbitro">
                                        <label for="modlgn_username">Arbitro</label>
                                        <select name="arbitros" class="form-control" required>
                                            <option value="-1">Seleccionar Arbitro</option>
                                            <?php foreach ($arbitros as $arbitro): ?>
                                                <option value="<?= $arbitro->getId() ?>"
                                                    <?= ($arbitroSeleccionado===$arbitro->getId().'') ? 'selected' : ''?>>
                                                    <?= $arbitro->getNombre() . ' ' . $arbitro->getApellidos() ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </p>
                                    <p id="login-form-direccion">
                                        <label for="modlgn_direccion">Direccion del encuentro</label>
                                        <input id="modlgn_direccion" type="text" name="direccion" required
                                               size="18" class="form-control"
                                               value="<?=$direccion?>"
                                               autocomplete="off">
                                    </p>
                                    <p id="login-form-fecha">
                                        <label for="modlgn_fecha">Fecha y hora del encuentro</label>
                                        <input id="modlgn_fecha" type="datetime-local" name="fecha" size="18"
                                               value="<?=$fecha?>"
                                               autocomplete="off" required>
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



