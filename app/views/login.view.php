<?php require __DIR__ . '/partials/cabecera.view.part.php'; ?>
    <div class="main">
        <div class="shop_top">
            <div class="container">

                <div>
                    <div class="login-title">
                        <h4 class="title">Entar en FutApp</h4>
                        <div id="loginbox" class="loginbox">
                            <form action="/login" method="post" name="login" id="login-form">
                                <fieldset class="input">
                                    <p id="login-form-username">
                                        <label for="modlgn_username">Email</label>
                                        <input id="modlgn_username" type="text" name="email" size="18"
                                               class="form-control">
                                    </p>
                                    <p id="login-form-password">
                                        <label for="modlgn_passwd">Password</label>
                                        <input id="modlgn_passwd" type="password" name="password" class="form-control"
                                               size="18"
                                        >
                                    </p>
                                    <?php if ($error_login !==''): ?>

                                        <div class="alert alert-danger" role="alert">
                                            <?= $error_login?>
                                        </div>
                                    <?php endif; ?>
                                    <div>

                                        <input type="submit" name="Submit" class="button" value="Login">
                                        <div class="clear"></div>
                                    </div>
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