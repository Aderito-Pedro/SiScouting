@extends('layouts.main')

@section('admin', $user->name)
@section('tipo', $user->tipo)
@section('conteudo')
        <script src="js/jquery-3.4.1.js"></script>
    <!-- Validation Header -->
    <div class="content-header">
        <div class="header-section">
            @if($errors->all())
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    @foreach($errors->all() as $error)
                        <h4><i class="fa fa-times-circle"></i> {{$error}} </h4>
                    @endforeach
                </div>
            @endif
            @if(session('msg'))
                <script>
                    $(function(){
                        $('#model-teste').modal('show');
                    });
                </script>
            @endif
            <h1>
                <i class="fa fa-street-view"></i>Novo Registro de Jogador<br><small>...</small>
            </h1>
        </div>
    </div>
    <ul class="breadcrumb breadcrumb-top">
        <li>Jogadores</li>
        <li><a href="">Novo Jogador</a></li>
    </ul>
    <div class="row">
        <div class="col-md-12">
            <!-- Form Validation Example Block -->
            <div class="block">
                <!-- Form Validation Example Title -->
                <div class="block-title">
                    <h2><strong>Registo de</strong> Jogador</h2>
                </div>
                <!-- END Form Validation Example Title -->

                <!-- Form Validation Example Content -->
                <form id="advanced-wizard" action="{{route('jogador.jogador')}}" method="POST" class="form-horizontal form-bordered" enctype="multipart/form-data">
                    @csrf
                    <div id="advanced-first" class="step">
                        <!-- Step Info -->
                        <div class="wizard-steps">
                            <div class="row">
                                <div class="col-xs-6 active">
                                    <span>1º Passo</span>
                                </div>
                                <div class="col-xs-6">
                                    <span>2º Passo</span>
                                </div>
                            </div>
                        </div>
                        <!-- END Step Info -->
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
                            <label class="col-md-4 control-label" for="val_apelido">Apelido <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="text" id="val_apelido" name="apelido" class="form-control" placeholder="Digite o Apelido.." value="{{old('apelido')}}" required>
                                    <span class="input-group-addon"><i class="gi gi-user"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="val_identificacao">Nº Indentificação (BI, PASSAPORTE) <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="text" id="masked_bi" name="n_identificacao" class="form-control" placeholder="000000000AZ000" value="{{old('n_identificacao')}}" required>
                                    <span class="input-group-addon"><i class="gi gi-nameplate"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="example-file-input">Foto </label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="file" id="img" name="img" >
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="example-datepicker">Data de Nascimento <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                   <!-- <input type="date" id="example-datepicker3" name="data_fundacao"  placeholder="dd-mm-yyyy" required>-->
                                   <input type="text" id="example-datepicker4" name="data_nascimento" class="form-control input-datepicker" data-date-format="yyyy-mm-dd" placeholder="yyyy-mm-dd" value="{{old('data_nascimento')}}" required>
                                   <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
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
                            <label class="col-md-4 control-label" for="val_skill">Endereço <span class="text-danger">*</span></label>
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
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="masked_phone">Contacto</label>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="input-group">
                                        <input type="text" id="masked_phone" name="contacto1" class="form-control" placeholder="(+244) 999-999-999" value="{{old('telefone1')}}" required>
                                        <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="input-group">
                                        <input type="text" id="masked_phone1" name="contacto2" class="form-control" placeholder="(+244) 999-999-999" value="{{old('telefone2')}}">
                                        <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                    </div>
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
                            <label class="col-md-4 control-label" >Altura <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="float"  name="altura" class="form-control" placeholder="0.00" value="{{old('altura')}}" required>
                                    <span class="input-group-addon"><i class="fa fa-circle-o-notch"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" >Peso <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="float"  name="peso" class="form-control" placeholder="0.00" value="{{old('peso')}}" required>
                                    <span class="input-group-addon"><i class="fa fa-circle-o-notch"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" >Numero <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input type="int" id="val_email" name="numero" class="form-control" placeholder="000" value="{{old('numero')}}" required>
                                    <span class="input-group-addon"><i class="fa fa-circle-o-notch"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="val_skill">Pé Dominante <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <select id="pe" name="pe" class="form-control" value="{{old('pe')}}" required>
                                    <option></option>
                                    <option value="Destro">Destro</option>
                                    <option value="Canhoto">Canhoto</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="val_skill">Posição <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <select id="val_posicao" name="val_posicao" class="form-control" required>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="val_skill">Estado na Equipa <span class="text-danger">*</span></label>
                            <div class="col-md-6">
                                <select id="estado" name="estado" class="form-control" value="{{old('estado')}}" required>
                                    <option></option>
                                    <option value="Principal">Principal</option>
                                    <option value="Reserva">Reserva</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="val_username">Descrição <span class="text-danger">*</span></label>
                            <div class="col-md-6">

                                    <textarea id="example-advanced-bio" name="descricao" rows="6" class="form-control" placeholder="Descrição bibligrafica do Jogador..."></textarea>

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
                </form>

            </div>

        </div>

    </div>
    <div id="model-teste" class="modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                </div>
                <div class="modal-body">
                    <div class="alert alert-success alert-dismissable">
                        <!--<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>-->
                        <h4><i class="fa fa-check-circle"></i>  {{session('msg')}}</h4>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="{{route('jogador.perfil',$idJogador)}}"><button type="button" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i> Ver os Dados do Jogador Registrado</button></a>
                    <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>


    <script src="js/helpers/gmaps.min.js"></script>
    <script src="js/pages/formsWizard.js"></script>

<script>
    $(function (){
            $.ajax({
                url: '{{route('jogador.posicoes')}}',
                type: 'get',
                beforeSend: function (){
                    $("#val_posicao").html("carregando...");
                },
                success: function (data){
                    $("#val_posicao").html(data);
                },
                error: function (data){
                    $("#val_posicao").html("Erro ao Carregar");
                }

            });
        });

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


@endsection

