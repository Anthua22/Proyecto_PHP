<?php

use FUTAPP\app\helpers\Utils;

?>
<!DOCTYPE HTML>
<html>
<head>
    <title>FutApp</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <link href="../../../public/css/bootstrap.css" rel='stylesheet' type='text/css'/>
    <link href="../../../public/css/style.css" rel='stylesheet' type='text/css'/>
    <link href="../../../public/css/mensajes.css" rel='stylesheet' type='text/css'/>
    <link rel="stylesheet" href="/node_modules/bootstrap/dist/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
    <!--<script src="js/jquery.easydropdown.js"></script>-->
    <!--start slider -->
    <link rel="stylesheet" href="../../../public/css/fwslider.css" media="all">
    <link rel="stylesheet" href="/public/css/partidos.css" media="all"/>
    <script src="/node_modules/jcarousel/dist/jquery.jcarousel.js"></script>
    <script src="/public/css/partidos.css"></script>
    <script src="/node_modules/jquery/dist/jquery.js"></script>
    <script src="/node_modules/sweetalert2/dist/sweetalert2.js"></script>
    <script src="/public/js/comun.js"></script>
    <link rel="stylesheet" href="/node_modules/sweetalert2/dist/sweetalert2.css"/>
    <!--end slider -->


</head>
<body>
<div class="header">

    <nav class="navbar justify-content-between">
        <div>
            <a href="/" class="navbar-brand"><img src="../../../public/images/logofutapp.png" alt=""/></a>
            <a href="/" class="navbar-brand" style="font-size: 40px; font-family: Georgia; color: red;">FutApp</a>
        </div>

        <ul class="nav" id="nav">
            <li style="<?= Utils::isOpcionMenuActiva('index') ? 'background-color: yellow;':''?>"><a href="/">Partidos</a></li>
            <li style="<?= Utils::isOpcionMenuActiva('equipos') ? 'background-color: yellow;':''?>"><a href="/equipos">Equipos</a></li>
            <li style="<?= Utils::isOpcionMenuActivaInArray(['arbitros','perfil']) ? 'background-color: yellow;':''?>"><a href="/arbitros">Arbitros</a></li>
            <?php if(!is_null($usuario) && $usuario->getRole()==='arbitro'):?>
            <li style="<?= Utils::isOpcionMenuActiva('mis-partidos') ? 'background-color: yellow;':''?>"><a href="/mis-partidos">Mis Partidos</a></li>
            <?php endif;?>
            <?php if(!is_null($usuario)&&$usuario->getRole()==='admin'):?>
            <li style="<?= Utils::isOpcionMenuActiva('add-equipo') ? 'background-color: yellow;':''?>"><a href="/add-equipo">Añadir Equipo</a></li>
            <li style="<?= Utils::isOpcionMenuActiva('add-partido') ? 'background-color: yellow;':''?>"><a href="/add-partido">Asignar Partido</a></li>

            <?php endif;?>
        </ul>

        <?php if (is_null($usuario)): ?>

            <ul class="nav">
                <li><a href="/login">Entrar</a><a href="/register">Registrarse</a></li>

            </ul>
        <?php else :?>
            <ul class="nav">
                <li><a href="/perfil/<?=$usuario->getId()?>"> <img src="<?=$usuario->getPathFoto()?>" style="width: 80px; height: 80px; border-radius: 160px; border: 5px solid #666;" alt=""/> <span style="color: white"><?= $usuario->getNombre().' '.$usuario->getApellidos() ?></span></a> <a href="/logout" style="color: white">Cerrar Sesión</a></li>
            </ul>



        <?php endif; ?>

    </nav>

</div>