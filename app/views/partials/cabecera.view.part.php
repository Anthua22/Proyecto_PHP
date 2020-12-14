<!DOCTYPE HTML>
<html>
<head>
    <title>FutApp</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link href="../../../css/bootstrap.css" rel='stylesheet' type='text/css'/>
    <link href="../../../css/style.css" rel='stylesheet' type='text/css'/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
    <!--<script src="js/jquery.easydropdown.js"></script>-->
    <!--start slider -->
    <link rel="stylesheet" href="../../../css/fwslider.css" media="all">
    <script src="../../../js/jquery-ui.min.js"></script>
    <script src="../../../js/fwslider.js"></script>
    <!--end slider -->


</head>
<body>
<div class="header">

    <nav class="navbar justify-content-between">
        <div>
            <a href="/" class="navbar-brand"><img src="../../../images/logofutapp.png" alt=""/></a>
            <a href="/" class="navbar-brand" style="font-size: 40px; font-family: Georgia; color: red;">FutApp</a>
        </div>

        <ul class="nav" id="nav">

            <li><a href="/">Partidos</a></li>
            <li><a href="/equipos">Equipos</a></li>
            <li><a href="/arbitros">Arbitros</a></li>
            <?php if(!is_null($usuario) && $usuario->getRole()==='arbitro'):?>
            <li><a href="/mis-partidos">Mis Partidos</a></li>
            <?php endif;?>
            <?php if(!is_null($usuario)&&$usuario->getRole()==='admin'):?>
            <li><a href="/add-equipo">Añadir Equipo</a></li>
            <li><a href="/add-partido">Asignar Partido</a></li>

            <?php endif;?>
        </ul>

        <?php if (is_null($usuario)): ?>

            <ul class="nav">
                <li><a href="/login">Entrar</a><a href="/register">Registrarse</a></li>

            </ul>
        <?php else :?>
            <ul class="nav">
                <li><a href="/mi-perfil"> <img src="/images/users/<?=$usuario->getFoto()?>" style="width: 80px; height: 80px; border-radius: 160px; border: 5px solid #666;" alt=""/> <span style="color: white"><?= $usuario->getNombre().' '.$usuario->getApellidos() ?></span></a> <a href="/logout" style="color: white">Cerrar Sesión</a></li>
            </ul>



        <?php endif; ?>

    </nav>

</div>