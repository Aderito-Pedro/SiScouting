@extends('layouts.main')

@section('admin', $user->name)
@section('tipo', $user->tipo)
@section('conteudo')

<div class="content-header content-header-media">
    <div class="header-section">
        <div class="row">
            <!-- Main Title (hidden on small devices for the statistics to fit) -->
            <div class="col-md-4 col-lg-6 hidden-xs hidden-sm">
                <h1>Bem Vindo ao<strong> SiScouting</strong><br><small>O sistema de Scaouting de Tatica</small></h1>
            </div>
            <!-- END Main Title -->

            <!-- Top Stats -->
            <div class="col-md-8 col-lg-6">

                <div class="row text-center">
                    <div class="col-xs-4 col-sm-3">

                    </div>
                    <div class="col-xs-4 col-sm-3">
                        <h2 class="animation-hatch">
                            <strong>{{$qtdJogador}}</strong><br>
                            <small><i class="fa fa-street-view"></i> Jogadores</small>
                        </h2>
                    </div>
                    <div class="col-xs-4 col-sm-3">
                        <h2 class="animation-hatch">
                            <strong>0</strong><br>
                            <small><i class="gi gi-cup"></i> Trofeus</small>
                        </h2>
                    </div>
                    <div class="col-xs-4 col-sm-3">
                        <h2 class="animation-hatch">
                            <strong>{{$qtdTecnico}}</strong><br>
                            <small><i class="fa fa-users"></i> Tecnico</small>
                        </h2>
                    </div>

                </div>
            </div>
            <!-- END Top Stats -->
        </div>
    </div>
    <!-- For best results use an image with a resolution of 2560x248 pixels (You can also use a blurred image with ratio 10:1 - eg: 1000x100 pixels - it will adjust and look great!) -->
    <img src="/img/placeholders/headers/yha.jpg" alt="header image" class="animation-pulseSlow">
</div>

<div class="row">
    <div class="col-sm-6 col-lg-3">
        <!-- Widget -->
        <a href="page_ready_article.php" class="widget widget-hover-effect1">
            <div class="widget-simple">
                <div class="widget-icon pull-left themed-background-autumn animation-fadeIn">
                    <i class="fa fa-futbol-o"></i>
                </div>
                <h3 class="widget-content text-right animation-pullDown">
                    <strong> Jogos</strong><br>
                    <small>Mountain Trip</small>
                </h3>
            </div>
        </a>
        <!-- END Widget -->
    </div>
    <div class="col-sm-6 col-lg-3">
        <!-- Widget -->
        <a href="page_comp_charts.php" class="widget widget-hover-effect1">
            <div class="widget-simple">
                <div class="widget-icon pull-left themed-background-spring animation-fadeIn">
                    <i class="gi gi-cup"></i>
                </div>
                <h3 class="widget-content text-right animation-pullDown">
                    + <strong>250%</strong><br>
                    <small>Sales Today</small>
                </h3>
            </div>
        </a>
        <!-- END Widget -->
    </div>
    <div class="col-sm-6 col-lg-3">
        <!-- Widget -->
        <a href="page_ready_inbox.php" class="widget widget-hover-effect1">
            <div class="widget-simple">
                <div class="widget-icon pull-left themed-background-fire animation-fadeIn">
                    <i class="gi gi-envelope"></i>
                </div>
                <h3 class="widget-content text-right animation-pullDown">
                    5 <strong>Messages</strong>
                    <small>Support Center</small>
                </h3>
            </div>
        </a>
        <!-- END Widget -->
    </div>
    <div class="col-sm-6 col-lg-3">
        <!-- Widget -->
        <a href="page_comp_gallery.php" class="widget widget-hover-effect1">
            <div class="widget-simple">
                <div class="widget-icon pull-left themed-background-amethyst animation-fadeIn">
                    <i class="gi gi-picture"></i>
                </div>
                <h3 class="widget-content text-right animation-pullDown">
                    +30 <strong>Photos</strong>
                    <small>Gallery</small>
                </h3>
            </div>
        </a>
        <!-- END Widget -->
    </div>
    <div class="col-sm-6">
        <!-- Widget -->
        <a href="page_comp_charts.php" class="widget widget-hover-effect1">
            <div class="widget-simple">
                <div class="widget-icon pull-left themed-background animation-fadeIn">
                    <i class="gi gi-wallet"></i>
                </div>
                <div class="pull-right">
                    <!-- Jquery Sparkline (initialized in js/pages/index.js), for more examples you can check out http://omnipotent.net/jquery.sparkline/#s-about -->
                    <span id="mini-chart-sales"></span>
                </div>
                <h3 class="widget-content animation-pullDown visible-lg">
                    Latest <strong>Sales</strong>
                    <small>Per hour</small>
                </h3>
            </div>
        </a>
        <!-- END Widget -->
    </div>
    <div class="col-sm-6">
        <!-- Widget -->
        <a href="page_widgets_stats.php" class="widget widget-hover-effect1">
            <div class="widget-simple">
                <div class="widget-icon pull-left themed-background animation-fadeIn">
                    <i class="gi gi-crown"></i>
                </div>
                <div class="pull-right">
                    <!-- Jquery Sparkline (initialized in js/pages/index.js), for more examples you can check out http://omnipotent.net/jquery.sparkline/#s-about -->
                    <span id="mini-chart-brand"></span>
                </div>
                <h3 class="widget-content animation-pullDown visible-lg">
                    Our <strong>Brand</strong>
                    <small>Popularity over time</small>
                </h3>
            </div>
        </a>
        <!-- END Widget -->
    </div>
</div>
@endsection
