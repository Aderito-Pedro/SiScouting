<!DOCTYPE html>
<!--[if IE 9]>         <html class="no-js lt-ie10" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">

        <title>SiScouting</title>

        <meta name="description" content="ProUI is a Responsive Bootstrap Admin Template created by pixelcave and published on Themeforest.">
        <meta name="author" content="pixelcave">
        <meta name="robots" content="noindex, nofollow">
        <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0">

        <!-- Icons -->
        <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
        <link rel="shortcut icon" href="img/favicon.png">

        <!-- END Icons -->

        <!-- Stylesheets -->
        <!-- Bootstrap is included in its original form, unaltered -->
        <link rel="stylesheet" href="css/bootstrap.min.css">

        <!-- Related styles of various icon packs and plugins -->
        <link rel="stylesheet" href="css/plugins.css">

        <!-- The main stylesheet of this template. All Bootstrap overwrites are defined in here -->
        <link rel="stylesheet" href="css/main.css">

        <!-- Include a specific file here from css/themes/ folder to alter the default theme of the template -->

        <!-- The themes stylesheet of this template (for using specific theme color in individual elements - must included last) -->
        <link rel="stylesheet" href="css/themes.css">
        <!-- END Stylesheets -->

        <!-- Modernizr (browser feature detection library) -->
        <script src="js/vendor/modernizr.min.js"></script>
        <script src="js/jquery-3.4.1.js"></script>

    </head>
    <body>
        <header class="navbar navbar-default">

            <ul class="nav navbar-nav-custom pull-right">



                <!-- User Dropdown -->
                <li class="dropdown">
                    <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="img/placeholders/avatars/avatar2.jpg" alt="avatar"> <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-custom dropdown-menu-right">
                        <li>
                            <a href="\logout"><i class="fa fa-ban fa-fw pull-right"></i> Logout</a>
                        </li>

                    </ul>
                </li>
                <!-- END User Dropdown -->
            </ul>
            <!-- END Right Header Navigation -->
        </header>

        <div id="page-wrapper">

                <div id="main-container">
<div id="page-content">
    <!-- Wizard Header -->

    <div class="content-header">
        <div class="header-section">
            <h1><i class="fa fa-shirtsinbulk"></i>Inserir Dados do Clube</h1>
        </div>
    </div>


    <!-- END Wizard Header -->

    <!-- Progress Bar Wizard Block -->
    @if($errors->all())
        <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            @foreach($errors->all() as $error)
                <h4><i class="fa fa-times-circle"></i> {{$error}} </h4>
            @endforeach
        </div>
    @endif
    <!-- Wizards Row -->
    <div class="row">
        <div class="col">
            <!-- Wizard with Validation Block -->
            <div class="block">
                <!-- Wizard with Validation Title -->
                <div class="block-title">

                </div>
                <!-- END Wizard with Validation Title -->

                <!-- Wizard with Validation Content -->
                <form id="advanced-wizard" action="{{route('gest.insertClube')}}" method="post" class="form-horizontal form-bordered" enctype="multipart/form-data">
                    <!-- First Step -->
                    @csrf
                    <div id="advanced-first" class="step">
                        <!-- Step Info -->
                        <div class="wizard-steps">
                            <div class="row">
                                <div class="col-xs-6 active">
                                    <span>1º Passo</span>
                                </div>
                                <div class="col-xs-6">
                                    <span>2º Passe</span>
                                </div>
                            </div>
                        </div>
                        <!-- END Step Info -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="val_username">Nome do Clube <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="text" id="val_username" name="clube" class="form-control" placeholder="Nome do Clube.." value="{{old('clube')}}" required>
                                    <span class="input-group-addon"><i class="fa fa-shirtsinbulk"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="val_email">Email <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="email" id="val_email" name="email" class="form-control" placeholder="test@example.com" value="{{old('email')}}" required>
                                    <span class="input-group-addon"><i class="gi gi-envelope"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="val_username">Fundador do Clube <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="text" id="val_username" name="fundador" class="form-control" placeholder="Nome do Fundador.." value="{{old('fundador')}}" required>
                                    <span class="input-group-addon"><i class="gi gi-user"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" >Emblema</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="file" id="image" name="image" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="example-datepicker">Data de Fundação <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                   <input type="text" id="example-datepicker4" name="data_nascimento" class="form-control input-datepicker" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd" value="{{old('data_nascimento')}}" required>
                                   <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="val_skill">Localização <span class="text-danger">*</span></label>
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="val_skill">Pais</label>
                                    <select id="val_pais" name="val_pais" class="form-control" required>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label for="val_skill">Provincia</label>
                                    <select id="val_provincia" name="val_provincia" class="form-control" required>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label for="val_skill">Municipio</label>
                                    <select id="val_municipio" name="val_municipio" class="form-control" required>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END First Step -->

                    <!-- Second Step -->
                    <div id="advanced-second" class="step">
                        <!-- Step Info -->
                        <div class="wizard-steps">
                            <div class="row">
                                <div class="col-xs-6 done">
                                    <span>1º Passo</span>
                                </div>
                                <div class="col-xs-6 active">
                                    <span>2º Passo</span>
                                </div>
                            </div>
                        </div>
                        <!-- END Step Info -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="val_username">Escalão <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="text" id="val_username" name="escalao" class="form-control" placeholder="Escalão.." value="{{old('escalao')}}" required>
                                    <span class="input-group-addon"><i class="fa fa-circle-o-notch"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="masked_phone">Contacto</label>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="input-group">
                                        <input type="text" id="masked_phone" name="telefone1" class="form-control" placeholder="(+244) 999-999-999" value="{{old('telefone1')}}" required>
                                        <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="input-group">
                                        <input type="text" id="masked_phone1" name="telefone2" class="form-control" placeholder="(+244) 999-999-999" value="{{old('telefone2')}}">
                                        <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="val_username">Estadio <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="text" id="val_username" name="estadio" class="form-control" placeholder="Estadio.." value="{{old('estadio')}}" required>
                                    <span class="input-group-addon"><i class="fa fa-circle-o-notch"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="example-advanced-bio">Descrição</label>
                            <div class="col-md-8">
                                <textarea id="example-advanced-bio" name="descricao" rows="6" class="form-control" placeholder="Descrição bibligrafica do Clube..." value="{{old('descricao')}}"></textarea>
                            </div>
                        </div>

                    </div>
                    <!-- END Second Step -->

                    <!-- Form Buttons -->
                    <div class="form-group form-actions">
                        <div class="col-md-8 col-md-offset-4">
                            <input type="reset" class="btn btn-sm btn-warning" id="back2" value="">
                            <input type="submit" class="btn btn-sm btn-primary" id="next2" value="Seguite">
                        </div>
                    </div>
                    <!-- END Form Buttons -->
                </form>
                <!-- END Wizard with Validation Content -->
            </div>
            <!-- END Wizard with Validation Block -->
        </div>
    </div>
    <!-- END Wizards Row -->

    <!-- Clickable Wizard Block -->


</div>
<footer class="clearfix">
    <div class="pull-right">
        Crafted with <i class="fa fa-heart text-danger"></i> by <a href="#" target="_blank">SiScouting</a>
    </div>

</footer>
<!-- END Footer -->
</div>
<!-- END Main Container -->

<!-- END Page Container -->
</div>
<!-- END Page Wrapper -->

<!-- END User Settings -->

<!-- jQuery, Bootstrap.js, jQuery plugins and Custom JS code -->
<script src="js/vendor/jquery.min.js"></script>
<script src="js/vendor/bootstrap.min.js"></script>
<script src="js/plugins.js"></script>
<script src="js/app.js"></script>

<!-- Google Maps API Key (you will have to obtain a Google Maps API key to use Google Maps) -->
<!-- For more info please have a look at https://developers.google.com/maps/documentation/javascript/get-api-key#key -->

<script src="js/helpers/gmaps.min.js"></script>
<script src="js/pages/formsWizard.js"></script>
<script>

    $(function (){
        $.ajax({
            url: '{{route('sis.getPais')}}',
            type: 'get',
            beforeSend: function (){
                $("#val_pais").html("carregando...");
            },
            success: function (data){
                $("#val_pais").html(data);
            },
            error: function (data){
                $("#val_pais").html("Erro ao Carregar");
            }

        });

    });


    $('#val_pais').on('change',function (){
        var idEstado = $("#val_pais").val();
        console.log(idEstado);
        $.ajax({
            url: '/buscaProvincia/'+idEstado,
            type: 'get',
            beforeSend: function (){
                $("#val_provincia").html("carregando");
            },
            success: function (data){
                $("#val_provincia").html(data);
            },
            error: function (data){
                $("#val_provincia").html("Erro ao Carregar");
            }
        });
    });
    $('#val_provincia').on('change',function (){
        var idEstado = $("#val_provincia").val();
        console.log(idEstado);
        $.ajax({
            url: '/buscamunicipio/'+idEstado,
            type: 'get',
            beforeSend: function (){
                $("#val_municipio").html("carregando");
            },
            success: function (data){
                $("#val_municipio").html(data);
            },
            error: function (data){
                $("#val_municipio").html("Erro ao Carregar");
            }
        });
    });
    </script>
<script>$(function(){ FormsWizard.init(); });</script>

<script src="js/pages/formsValidation.js"></script>
<script>$(function() { FormsValidation.init(); });</script>

<!-- Load and execute javascript code used only in this page -->
<script src="js/pages/tablesDatatables.js"></script>
<script>$(function(){ TablesDatatables.init(); });</script>
<!-- Load and execute javascript code used only in this page -->
<script src="js/pages/index.js"></script>
<script>$(function(){ Index.init(); });</script>




</body>
</html>

