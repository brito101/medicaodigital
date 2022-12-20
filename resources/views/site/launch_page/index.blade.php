<!--
@born Dec 17, 2022
@author Rodrigo Brito <contato@rodrigobrito.dev.br>
-->

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" itemscope itemtype="http://schema.org/WebPage">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <!-- Fonts-->
    <link rel="stylesheet" href="{{ asset('launch_page/fonts/fontawesome/font-awesome.min.css') }}">
    <!-- Vendors-->
    <link rel="stylesheet" href="{{ asset('launch_page/vendors/bootstrap/grid.css') }}">
    <link rel="stylesheet" href="{{ asset('launch_page/vendors/bootstrap/YTPlayer/css/YTPlayer.css') }}">
    <link rel="stylesheet" href="{{ asset('launch_page/vendors/vegas/vegas.css') }}">
    <!-- App & fonts-->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Work+Sans:300,400,500,700">
    <link rel="stylesheet" id="app-stylesheet" href="{{ asset('launch_page/main.css') }}">
    <!--[if lt IE 9]>
   <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <![endif]-->
    <link rel="icon" href="{{ asset('img/favicon.png') }}" type="image/png">
    @metas
</head>

<body>
    <div class="page-wrap" id="root">
        <!-- Content-->
        <div class="md-content">

            <!-- hero -->
            <div class="hero md-skin-dark">
                <div id="particles-js" data-effect="default"></div>

                <div class="container">
                    <div class="hero__wrapper">
                        <div class="row">
                            <div class="col-lg-10 col-xs-offset-0 col-sm-offset-0 col-md-offset-0 col-lg-offset-1 ">
                                <div class="hero__title_inner"><span class="hero__icon">M</span>
                                    <h1 class="hero__title">Medição Digital</h1>
                                    <p class="hero__text">A medição nas suas mãos. Estamos quase prontos para o
                                        lançamento</p>
                                </div>
                            </div>
                        </div>

                        <!-- countdown__module hide undefined -->
                        <div class="countdown__module hide undefined" data-date="2023/02/01">
                            <p><span>%D</span> Dias</p>
                            <p><span>%H</span> Horas</p>
                            <p><span>%M</span> Minutos</p>
                            <p><span>%S</span> Segundos</p>
                        </div><!-- End / countdown__module hide undefined -->

                        <div class="service-wrapper">

                            <!-- service -->
                            <div class="service">
                                <h2 class="service__title">Plataforma Web</h2>
                                <p class="service__text">Acesse onde e quando quiser</p>
                            </div><!-- End / service -->

                            <!-- service -->
                            <div class="service">
                                <h2 class="service__title">App Mobile Design</h2>
                                <p class="service__text">Leve e responsivo</p>
                            </div><!-- End / service -->

                            <!-- service -->
                            <div class="service">
                                <h2 class="service__title">Segurança de Dados</h2>
                                <p class="service__text">Seus dados protegidos sempre</p>
                            </div><!-- End / service -->

                        </div>
                    </div>
                </div>
            </div><!-- End / hero -->

        </div>
        <!-- End / Content-->
    </div>
    <!-- Vendors-->
    <script src="{{ asset('launch_page/vendors/jquery/jquery.js') }}"></script>
    <script src="{{ asset('launch_page/vendors/jquery.countdown/jquery.countdown.js') }}"></script>
    <script src="{{ asset('launch_page/vendors/flat-surface-shader/fss.js') }}"></script>
    <script src="{{ asset('launch_page/vendors/particles.js/particles.js') }}"></script>
    <script src="{{ asset('launch_page/vendors/waterpipe/waterpipe.js') }}"></script>
    <script src="{{ asset('launch_page/vendors/quietflow/quietflow.js') }}"></script>
    <script src="{{ asset('launch_page/vendors/YTPlayer/YTPlayer.js') }}"></script>
    <script src="{{ asset('launch_page/vendors/vegas/vegas.js') }}"></script>
    <!-- App-->
    <script src="{{ asset('launch_page/js/main.js') }}"></script>
</body>

</html>
