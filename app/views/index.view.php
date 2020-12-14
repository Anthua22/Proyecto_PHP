<div class="main">
    <div class="content-top">
        <h2>Próximos partidos</h2>
        <ul id="flexiselDemo3">
            <li><img src="../../images/board1.jpg"/></li>
            <li><img src="../../images/board2.jpg"/></li>
            <li><img src="../../images/board3.jpg"/></li>
            <li><img src="../../images/board4.jpg"/></li>
            <li><img src="../../images/board5.jpg"/></li>
        </ul>
        <h3>SnowBoard Extreme Series</h3>
        <script type="text/javascript">
            document.addEventListener('DOMContentLoaded', () => {
                let ul = document.getElementById('flexiselDemo3');
                set
            }).load(function () {
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
        <script type="text/javascript" src="../../js/jquery.flexisel.js"></script>
    </div>
</div>

<div class="features">
    <div class="container">
        <h3 class="m_3">Partidos Anteriores</h3>

        <?php require __DIR__ . '/partials/partidos.view.part.php'; ?>
    </div>
</div>

<script src="/js/mine/partidos.js"></script>
