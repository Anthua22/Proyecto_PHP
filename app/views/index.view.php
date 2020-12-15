

<!--<div class="main">
    <div class="content-top">
        <h2>Próximos partidos</h2>

        <ul id="flexiselDemo3">


                </li>

        </ul>

        <script type="text/javascript">
            $(window).load(function () {
                $("#flexiselDemo3").flexisel({
                    visibleItems: 5,
                    animationSpeed: 1000,
                    autoPlay: true,
                    autoPlaySpeed: 3000,
                    pauseOnHover: true,
                    enableResponsiveBreakpoints: true,
                    responsiveBreakpoints: {
                        portrait: {
                            changePoint: 480,
                            visibleItems: 1
                        },
                        landscape: {
                            changePoint: 640,
                            visibleItems: 2
                        },
                        tablet: {
                            changePoint: 768,
                            visibleItems: 3
                        }
                    }
                });

            });
        </script>
    </div>


    <script type="text/javascript" src="../../public/js/jquery.flexisel.js"></script>
</div>
</div>
-->
<div class="features">
    <div class="container">
        <h3 class="m_3">Partidos Anteriores</h3>

        <?php require __DIR__ . '/partials/partidos.view.part.php'; ?>
    </div>
</div>


