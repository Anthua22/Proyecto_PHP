<div class="container">
    <div class="messaging">
        <div class="inbox_msg">
            <div class="inbox_people">

                <div class="inbox_chat">
                    <?php use FUTAPP\app\repository\UsuariosRepository;
                    use FUTAPP\core\App;

                    if (!is_null($mensajes) && count($mensajes) >= 1): ?>
                        <?php foreach ($mensajes as $emisore): ?>


                            <div class="chat_list <?= \FUTAPP\app\helpers\Utils::isOpcionMenuActiva($emisore->getEmisor() . '') ? 'active_chat' : '' ?>">
                                <a href="/mensajes/mis-mensajes/<?= App::getRepository(\FUTAPP\app\repository\UsuariosRepository::class)->find($emisore->getEmisor())->getId() ?>">
                                    <div class="chat_people">
                                        <div class="chat_img">
                                            <img src="<?= App::getRepository(UsuariosRepository::class)->find($emisore->getEmisor())->getPathFoto() ?>"
                                                 alt="sunil">
                                        </div>
                                        <div class="chat_ib">
                                            <h5><?= App::getRepository(UsuariosRepository::class)->find($emisore->getEmisor())->getNombre() ?>

                                            </h5>

                                        </div>
                                    </div>
                                </a>

                            </div>


                        <?php endforeach; ?>
                    <?php else : ?>
                        <div class="chat_list">
                            No tienes ningun mensaje
                        </div>
                    <?php endif; ?>

                </div>
            </div>
            <?php if (!is_null($mensajesChat)): ?>
                <?php if (count($mensajesChat) >= 1): ?>

                    <div class="mesgs">

                        <div class="msg_history">
                            <?php foreach ($mensajesChat as $item): ?>
                                <?php if ($item->getEmisor() === $usuario->getId() || $item->getReceptor() === $usuario->getId()): ?>
                                    <div class="outgoing_msg">
                                        <div class="sent_msg">
                                            <p><?= $item->getMensaje() ?></p>
                                            <span class="time_date"> <?= $item->getHora() ?></span></div>
                                    </div>
                                <?php endif; ?>
                                <?php if ($item->getReceptor() === $usuario->getId()): ?>
                                    <div class="incoming_msg">
                                        <div class="incoming_msg_img"><img
                                                    src="<?= App::getRepository(UsuariosRepository::class)->find($item->getEmisor())->getPathFoto() ?>"
                                                    alt="sunil"></div>
                                        <div class="received_msg">
                                            <div class="received_withd_msg">
                                                <p><?= $item->getMensaje() ?></p>
                                                <span class="time_date"> <?= $item->getHora() ?></span></div>
                                        </div>


                                    </div>

                                <?php endif; ?>
                            <?php endforeach; ?>


                        </div>

                        <form class="type_msg" method="post">
                            <div class="input_msg_write">
                                <input type="text" class="write_msg" name="mensaje" required
                                       placeholder="Type a message"/>

                            </div>
                            <input class="msg_send_btn" type="submit" value="→">

                        </form>
                    </div>

                <?php endif; ?>
            <?php else: ?>
                <div class="mesgs">
                    <div class="msg_history">
                        Selecciona un chat
                    </div>
                </div>
            <?php endif; ?>


        </div>

    </div>
</div>
