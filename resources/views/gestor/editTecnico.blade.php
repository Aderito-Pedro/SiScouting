@extends('layouts.main')

@section('admin', $user->name)
@section('tipo', $user->tipo)
@section('conteudo')
<script src="js/jquery-3.4.1.js"></script>
    <!-- Validation Header -->
    <div class="content-header">
        <div class="header-section">
            <h1>
                <i class="fa fa-users"></i>Actualizar os Dados do Técnico da Equipa <br><small>"{{$tecnico->nome}}"!</small>
            </h1>
        </div>
    </div>
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
                    <h2><strong></strong></h2>
                </div>
                <!-- END Form Validation Example Title -->

                <!-- Form Validation Example Content -->
                <form id="form-validation" action="{{route('gest.uptdateTec',$tecnico->id)}}" method="post" class="form-horizontal form-bordered">
                    @csrf
                    @method('PUT')
                    <fieldset>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="val_username">Nome Completo <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="text" id="val_username" name="nome" class="form-control" value="{{$tecnico->nome}}" placeholder="Digite o Nome Completo.." >
                                    <span class="input-group-addon"><i class="gi gi-user"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="val_email">Email <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="email" id="val_email" name="email" class="form-control" value="{{$tecnico->email}}" placeholder="test@example.com" >
                                    <span class="input-group-addon"><i class="gi gi-envelope"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="masked_phone">Contacto</label>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="input-group">
                                        <input type="text" id="masked_phone" name="contacto1" class="form-control" value="{{$tecnico->contacto1}}" placeholder="(+244) 999-999-999"  required>
                                        <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="input-group">
                                        <input type="text" id="masked_phone1" name="contacto2" class="form-control" value="{{$tecnico->contacto2}}" placeholder="(+244) 999-999-999" >
                                        <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="val_email">Altura <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="float" id="val_email" name="altura" class="form-control" value="{{$tecnico->altura}}" placeholder="0.00" required>
                                    <span class="input-group-addon"><i class="fa fa-circle-o-notch"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="example-datepicker">Data de Nascimento <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                   <!-- <input type="date" id="example-datepicker3" name="data_fundacao"  placeholder="dd-mm-yyyy" required>-->
                                   <input type="text" id="example-datepicker4" name="data_nascimento" class="form-control input-datepicker" data-date-format="yyyy-mm-dd" value="{{$tecnico->data_nascimento}}" placeholder="yyyy-mm-dd" required>
                                   <span class="input-group-addon"><i class="fa fa-calendar"></i></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="val_skill">Categoria <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <select id="val_categoria" name="id_categoria"  class="form-control" required>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="val_username">Descrição <span class="text-danger">*</span></label>
                            <div class="col-md-6">

                                    <textarea id="example-advanced-bio" name="descricao" rows="6" class="form-control" value="{{$tecnico->descricao}}" placeholder="Descrição bibligrafica do Treinador..."></textarea>

                            </div>
                        </div>
                    </fieldset>
                    <div class="form-group form-actions">
                        <div class="col-md-8 col-md-offset-4">
                            <button type="submit" class="btn btn-sm btn-primary"><i class="hi hi-repeat"></i></i> Actualizar</button>

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
                url: '{{route('sis.getCategoria')}}',
                type: 'get',
                beforeSend: function (){
                    $("#val_categoria").html("carregando...");
                },
                success: function (data){
                    $("#val_categoria").html(data);
                },
                error: function (data){
                    $("#val_categoria").html("Erro ao Carregar");
                }

            });

        });



        </script>

<script src="js/pages/formsValidation.js"></script>
<script>$(function() { FormsValidation.init(); });</script>

@endsection
