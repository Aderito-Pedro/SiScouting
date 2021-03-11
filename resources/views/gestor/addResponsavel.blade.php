@extends('layouts.main')

@section('admin', $user->name)
@section('conteudo')
<script src="js/jquery-3.4.1.js"></script>
    <!-- Validation Header -->
    <div class="content-header">
        <div class="header-section">
            <h1>
                <i class="gi gi-certificate"></i>Novo Registo<br><small>...</small>
            </h1>

        </div>
    </div>
    <ul class="breadcrumb breadcrumb-top">
        <li>Clube</li>
        <li><a href="">Registar Responsiveis do Clube</a></li>
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
                    <h2><strong>Registo de</strong> Responsaveis do Clube</h2>
                </div>
                <!-- END Form Validation Example Title -->

                <!-- Form Validation Example Content -->
                <form id="form-validation" action="{{route('gest.responsavel')}}" method="post" class="form-horizontal form-bordered" enctype="multipart/form-data">
                    @csrf
                    <fieldset>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="val_username">Nome Completo <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="text" id="val_username" name="nome" class="form-control" placeholder="Digite o Nome Completo.." value="{{old('nome')}}" required>
                                    <span class="input-group-addon"><i class="gi gi-user"></i></span>
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
                            <label class="col-md-4 control-label" for="masked_phone">Contacto</label>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="input-group">
                                        <input type="text" id="masked_phone" name="numero1" class="form-control" placeholder="(+244) 999-999-999" value="{{old('numero1')}}" required>
                                        <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="input-group">
                                        <input type="text" id="masked_phone1" name="numero2" class="form-control" placeholder="(+244) 999-999-999" value="{{old('numero2')}}">
                                        <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="val_skill">Categoria <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <select id="val_categoria" name="id_rcategoria" class="form-control" required>
                                </select>
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

        </div>

    </div>
<script>
    $(function (){
        $.ajax({
            url: '{{route('sis.getRcategoria')}}',
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
