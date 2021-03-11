@extends('layouts.main')

@section('admin', $user->name)
@section('conteudo')
<script src="js/jquery-3.4.1.js"></script>
    <!-- Validation Header -->
    <div class="content-header">
        <div class="header-section">
            <h1>
                <i class="fa fa-users"></i>Novo Registro<br><small>...</small>
            </h1>
        </div>
    </div>
    <ul class="breadcrumb breadcrumb-top">
        <li>Clube</li>
        <li><a href="">Inscrever-se em Competição</a></li>
    </ul>
    @if($errors->all())
        @foreach($errors->all() as $error)
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="fa fa-times-circle"></i> {{$error}} </h4>
            </div>
        @endforeach
    @endif
    @if(session('msg'))
    <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="fa fa-check-circle"></i>  {{session('msg')}}</h4>
    </div>

    @endif
    <div class="row">
        <div class="col-md-12">
            <!-- Form Validation Example Block -->
            <div class="block">
                <!-- Form Validation Example Title -->
                <div class="block-title">
                    <h2><strong>Castro de</strong> Competição</h2>
                </div>
                <!-- END Form Validation Example Title -->

                <!-- Form Validation Example Content -->
                <form id="form-validation" action="{{route('gest.addcompeticao')}}" method="post" class="form-horizontal form-bordered" enctype="multipart/form-data">
                    @csrf
                    <fieldset>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="val_skill">Competições <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <select id="val_competicao" name="val_competicao" class="form-control" required>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="val_username">Objectivo da Competição <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="text" id="val_username" name="objectivo" class="form-control" placeholder="Digite o Objectivo da Competição.." value="{{old('objectivo')}}" required>
                                    <span class="input-group-addon"><i class="fa fa-circle-thin"></i></span>
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

<script src="js/pages/formsValidation.js"></script>
<script>$(function() { FormsValidation.init(); });</script>

@endsection
