<!DOCTYPE HTML>
<html>
<head>
    <title>FutApp</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link href="../../../css/bootstrap.css" rel='stylesheet' type='text/css'/>
    <link href="../../../css/style.css" rel='stylesheet' type='text/css'/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
    <!--<script src="js/jquery.easydropdown.js"></script>-->
    <!--start slider -->
    <link rel="stylesheet" href="../../../css/fwslider.css" media="all">
    <script src="../../../js/jquery-ui.min.js"></script>
    <script src="../../../js/fwslider.js"></script>
    <!--end slider -->
    <script type="text/javascript">
        $(document).ready(function () {
            $(".dropdown img.flag").addClass("flagvisibility");

            $(".dropdown dt a").click(function () {
                $(".dropdown dd ul").toggle();
            });

            $(".dropdown dd ul li a").click(function () {
                var text = $(this).html();
                $(".dropdown dt a span").html(text);
                $(".dropdown dd ul").hide();
                $("#result").html("Selected value is: " + getSelectedValue("sample"));
            });

            function getSelectedValue(id) {
                return $("#" + id).find("dt a span.value").html();
            }

            $(document).bind('click', function (e) {
                var $clicked = $(e.target);
                if (!$clicked.parents().hasClass("dropdown"))
                    $(".dropdown dd ul").hide();
            });


            $("#flagSwitcher").click(function () {
                $(".dropdown img.flag").toggleClass("flagvisibility");
            });
        });
    </script>


</head>
<body>
<div class="header">
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="header-left">

                    <nav class="navbar navbar-expand-lg">
                        <a href="/" class="navbar-brand"><img src="../../../images/logofutapp.png" alt=""/></a>
                        <a href="/" class="navbar-brand" style="font-size: 40px; font-family: Georgia; color: red; margin: 10px;">FutApp</a>

                        <script type="text/javascript" src="../../../js/responsive-nav.js"></script>
                    </nav>
                    <ul class="nav" id="nav">

                        <li><a href="/">Partidos</a></li>
                        <li><a href="equipos">Equipos</a></li>
                        <li><a href="arbitros">Arbitros</a></li>
                        <li><a href="add-partido">Mis Partidos</a></li>
                        <li><a href="add-equipo">Añadir Equipo</a></li>
                        <li><a href="add-partido">Asignar Partido</a></li>

                    </ul>
                    <div class="clear"></div>
                </div>
                <div class="header_right">
                    <!-- start search-->
                    <div class="search-box">
                        <div id="sb-search" class="sb-search">
                            <form>
                                <input class="sb-search-input" placeholder="Enter your search term..." type="search"
                                       name="search" id="search">
                                <input class="sb-search-submit" type="submit" value="">
                                <span class="sb-icon-search"> </span>
                            </form>
                        </div>
                    </div>
                    <!----search-scripts---->
                    <script src="../../../js/classie.js"></script>
                    <script src="../../../js/uisearch.js"></script>
                    <script>
                        new UISearch(document.getElementById('sb-search'));
                    </script>
                    <!----//search-scripts---->
                    <ul class="icon1 sub-icon1 profile_img">
                        <li><a class="active-icon c1" href="#"> </a>
                            <ul class="sub-icon1 list">
                                <div class="product_control_buttons">
                                    <a href="#"><img src="../../../images/edit.png" alt=""/></a>
                                        <a href="#"><img src="../../../images/close_edit.png" alt=""/></a>
                                </div>
                                <div class="clear"></div>
                                <li class="list_img"><img src="../../../images/1.jpg" alt=""/></li>
                                <li class="list_desc"><h4><a href="#">velit esse molestie</a></h4><span class="actual">1 x
                          $12.00</span></li>
                                <div class="login_buttons">
                                    <div class="check_button"><a href="../checkout.html">Check out</a></div>
                                    <div class="login_button"><a href="../login.html">Login</a></div>
                                    <div class="clear"></div>
                                </div>
                                <div class="clear"></div>
                            </ul>
                        </li>
                    </ul>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
    </div>
</div>