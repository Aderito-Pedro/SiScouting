@extends('layouts.mainAdmin')

@section('admin', $user->name)
@section('tipo', $user->tipo)
@section('conteudo')
<!-- Validation Header -->

<div class="content-header">
    <div class="header-section">
        <h1>
            <i class="fa fa-futbol-o"></i>Gerar Calendario<br><small>Gera os Calendarios de Jogos</small>
        </h1>


    </div>
</div>
<ul class="breadcrumb breadcrumb-top">
    <li>Jogos</li>
    <li><a href="">Gerar Calendario</a></li>
</ul>
@if($errors->all())
    <div class="alert alert-danger alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        @foreach($errors->all() as $error)
            <h4><i class="fa fa-angle-right"></i> {{$error}} </h4>
        @endforeach
    </div>
@endif
<div class="row">
    <div class="col-md-12">
        <!-- Form Validation Example Block -->
        <div class="block">
            <!-- Form Validation Example Title -->
            <div class="block-title">
                <h2><strong>Registo de</strong> Jogo</h2>
            </div>
            <!-- END Form Validation Example Title -->

            <!-- Form Validation Example Content -->
            <form id="form-validation" action="{{route('admin.gerarCalendario')}}" method="post" class="form-horizontal form-bordered" enctype="multipart/form-data">
                @csrf
                <fieldset>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="val_skill">Seleccione uma Competições <span class="text-danger">*</span></label>
                        <div class="col-md-6 center">
                            <select id="val_competicao" name="val_competicao" class="form-control" required>

                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="example-daterange1">Seleccione a data Campeonato</label>
                        <div class="col-md-6">
                            <div class="input-group input-daterange" data-date-format="mm/dd/yyyy">
                                <input type="text" id="example-daterange1" name="example-daterange1" class="form-control text-center" placeholder="Data de Inicio" required>
                                <span class="input-group-addon"><i class="fa fa-angle-right"></i></span>
                                <input type="text" id="example-daterange2" name="example-daterange2" class="form-control text-center" placeholder="Data de Termino" required>
                            </div>
                        </div>
                    </div>

                </fieldset>
                <div class="form-group form-actions">
                    <div class="col-md-8 col-md-offset-4">
                        <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-arrow-right"></i> Registar</button>

                    </div>
                </div>
            </form>


        </div>
        <!-- END Validation Block -->

    </div>

</div>

<script>
    $(function (){
        $.ajax({
            url: '{{route('sis.getCompeticao')}}',
            type: 'get',
            beforeSend: function (){
                $("#val_competicao").html("carregando...");
            },
            success: function (data){
                $("#val_competicao").html(data);
            },
            error: function (data){
                $("#val_competicao").html("Erro ao Carregar");
            }

        });
    });
</script>
<script>
    $(document).ready(function(){
        $('#val_competicao').on('change',function(){
            var selectValor = '#'+$(this).val();
            $('#selectCompeticao').children('div').hide();
            $('#selectCompeticao').children(selectValor).show();
        });
    });
</script>

<script src="js/pages/formsValidation.js"></script>
<script>$(function() { FormsValidation.init(); });</script>
@endsection
