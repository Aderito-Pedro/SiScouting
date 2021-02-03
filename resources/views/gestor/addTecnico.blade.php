@extends('layouts.main')

@section('admin', $user->name)
@section('conteudo')
<script src="js/jquery-3.4.1.js"></script>
    <!-- Validation Header -->
    <div class="content-header">
        <div class="header-section">
            <h1>
                <i class="gi gi-warning_sign"></i>Form Validation<br><small>Tools for easy form validation and user assist!</small>
            </h1>
        </div>
    </div>
    <ul class="breadcrumb breadcrumb-top">
        <li>Forms</li>
        <li><a href="">Validation</a></li>
    </ul>
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
                <form id="form-validation" action="/registerResponsavel" method="post" class="form-horizontal form-bordered">
                    @csrf
                    <fieldset>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="val_username">Nome Completo <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="text" id="val_username" name="nome" class="form-control" placeholder="Digite o Nome Completo.." required>
                                    <span class="input-group-addon"><i class="gi gi-user"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="val_email">Email <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="email" id="val_email" name="email" class="form-control" placeholder="test@example.com" required>
                                    <span class="input-group-addon"><i class="gi gi-envelope"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="masked_phone">Contacto</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="text" id="masked_phone" name="numero" class="form-control" placeholder="(+244) 999-999-999"  required>
                                    <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="val_skill">Categoria <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <select id="val_categoria" name="val_categoria" class="form-control" required>
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
            <!-- END Validation Block -->
            <div class="block" id="Treinador Principal">
                <!-- Form Validation Example Title -->
                <div class="block-title">
                    <h2><strong>Outros Dados do</strong> Treinador</h2>
                </div>
                <!-- END Form Validation Example Title -->

                <!-- Form Validation Example Content -->
                <form id="form-validation" action="page_forms_validation.php" method="post" class="form-horizontal form-bordered">
                    @csrf
                    <fieldset>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="val_username">Descrição <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="text" id="val_username" name="val_username" class="form-control" placeholder="Digite o Nome Completo.." required>
                                    <span class="input-group-addon"><i class="gi gi-user"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="val_email">Altura <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="float" id="val_email" name="val_email" class="form-control" placeholder="test@example.com" required>
                                    <span class="input-group-addon"><i class="gi gi-envelope"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="example-datepicker">Data de Nascimento <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="date" id="example-datepicker3" name="data_fundacao"  placeholder="dd-mm-yyyy" required>

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
                <!-- END Terms Modal -->
            </div>

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

@endsection
