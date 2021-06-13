@extends('layouts.main')

@section('admin', $user->name)
@section('tipo', $user->tipo)
@section('conteudo')
<!--
<div class="content-header">
<div class="header-section">
            <h1>
                <i class="fa fa-street-view"></i>
                Perfil do Jogador
            </h1>
        </div>
    </div>
-->
<div id="page-content">

                        <!-- eCommerce Customer Header -->
    <!-- END eCommerce Customer Header -->

    <!-- Customer Content -->
    <div class="row">
        <div class="col-lg-4">
            <!-- Customer Info Block -->
            <div class="block">
                <!-- Customer Info Title -->
                <div class="block-title">

                </div>
                <!-- END Customer Info Title -->

                <!-- Customer Info -->
                <div class="block-section text-center">
                    <a href="javascript:void(0)">
                        <img src="img/siscout/jogador/{{$jogador->img != NULL ? $jogador->img : "avatar.jpg"}}" alt="avatar" class="img-circle" style="height: 200px;width: 200px;">
                    </a>
                    <h3>
                        Apelido: <strong>"{{$jogador->apelido}}"</strong>
                    </h3>
                </div>
                <table class="table table-borderless table-striped table-vcenter">
                    <tbody>

                    </tbody>
                </table>
                <!-- END Customer Info -->
            </div>
            <!-- END Customer Info Block -->

            <!-- Quick Stats Block -->
            <div class="block gallery gallery-widget">
                <!-- Quick Stats Title -->
                <div class="block-title">
                    <h2 class="text-center"> <strong>Pé Dominante</strong> ({{$jogador->perna}})</h2>
                </div>
                <!-- END Quick Stats Title -->

                <!-- Quick Stats Content -->
                @if($jogador->perna ==='Destro')
                    <img src="img/placeholders/peDireto.png" alt="pe dominante" style="height: 170px;width: 350px;">
                @endif
                @if($jogador->perna ==='Canhoto')
                    <img src="img/placeholders/peEsquerdo.png" alt="pe dominante" style="height: 170px;width: 350px;">
                @endif


                <!-- END Quick Stats Content -->
            </div>
            <!-- END Quick Stats Block -->
        </div>
        <div class="col-lg-8">
            <!-- Orders Block -->
            <div class="block">
                <!-- Orders Title -->
                <div class="block-title">
                    <h2><i class="fa fa-user"></i> <strong>Dados Pessoais do Jogador</strong>: </h2>
                </div>
                <!-- END Orders Title -->

                <!-- Orders Content -->
                <table class="table table-bordered table-striped table-vcenter">
                    <tbody>
                        <tr>
                            <td style="width: 50%;"><strong>Nome Completo: </strong></td>
                            <td>{{$jogador->nome}}</td>
                        </tr>

                        <tr>
                            <td ><strong>Idade: </strong></td>
                            <td>{{$jogador->data_nascimento}}</td>
                        </tr>
                        <tr>
                            <td ><strong>Email: </strong></td>
                            <td>{{$jogador->email}}</td>
                        </tr>
                        <tr>
                            <td ><strong>Nº Indentidade: </strong></td>
                            <td>{{$jogador->n_identificacao}}</td>
                        </tr>
                        <tr>
                            <td ><strong>Contacto: </strong></td>
                            <td>{{$jogador->contacto1}}; {{$jogador->contacto2}}</td>
                        </tr>
                        <tr>
                            <td ><strong>Altura: </strong></td>
                            <td>{{$jogador->altura}}</td>
                        </tr>
                        <tr>
                            <td ><strong>Peso: </strong></td>
                            <td>{{$jogador->peso}}</td>
                        </tr>
                        <tr>
                            <td ><strong>Numero: </strong></td>
                            <td>{{$jogador->numero}}</td>
                        </tr>
                        <tr>
                            <td ><strong>Posição: </strong></td>
                            @foreach($posicoes as $posicao)
                                <td>{{$posicao->descricao}};</td>
                            @endforeach
                        </tr>
                        <tr>
                            <td ><strong>Estado na Equipa: </strong></td>
                            <td><span class="label {{($jogador->estado ==='Reserva')?"label-danger":"label-success"}}"> {{$jogador->estado}}</span></td>
                        </tr>
                    </tbody>
                </table>
                <!-- END Orders Content -->
            </div>
            <!-- END Orders Block -->

            <!-- Products in Cart Block -->
            <div class="block">
                <!-- Products in Cart Title -->
                <div class="block-title">
                    <h2><i class="fa fa-line-chart"></i> <strong>Dodos</strong> Estatisticos</h2>
                </div>
                <!-- END Products in Cart Title -->

                <!-- Products in Cart Content -->
                <table class="table table-bordered table-striped table-vcenter">
                    <tbody>
                        <tr>
                            <td class="text-center" style="width: 100px;"><a href="page_ecom_product_edit.html"><strong>PID.8715</strong></a></td>
                            <td class="hidden-xs" style="width: 15%;"><a href="page_ecom_product_edit.html">Product #98</a></td>
                            <td class="text-right hidden-xs" style="width: 10%;"><strong>$399,00</strong></td>
                            <td><span class="label label-success">Available (479)</span></td>
                            <td class="text-center" style="width: 70px;">
                                <a href="page_ecom_product_edit.html" data-toggle="tooltip" title="" class="btn btn-xs btn-default" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center"><a href="page_ecom_product_edit.html"><strong>PID.8725</strong></a></td>
                            <td class="hidden-xs"><a href="page_ecom_product_edit.html">Product #98</a></td>
                            <td class="text-right hidden-xs"><strong>$59,00</strong></td>
                            <td><span class="label label-success">Available (163)</span></td>
                            <td class="text-center">
                                <a href="page_ecom_product_edit.html" data-toggle="tooltip" title="" class="btn btn-xs btn-default" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center"><a href="page_ecom_product_edit.html"><strong>PID.8798</strong></a></td>
                            <td class="hidden-xs"><a href="page_ecom_product_edit.html">Product #98</a></td>
                            <td class="text-right hidden-xs"><strong>$59,00</strong></td>
                            <td><span class="label label-danger">Out of Stock</span></td>
                            <td class="text-center">
                                <a href="page_ecom_product_edit.html" data-toggle="tooltip" title="" class="btn btn-xs btn-default" data-original-title="Edit"><i class="fa fa-pencil"></i></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <!-- END Products in Cart Content -->
            </div>
            <!-- END Products in Cart Block -->

            <!-- Customer Addresses Block -->

            <!-- Referred Members Block -->

            <!-- END Referred Members Block -->

            <!-- Private Notes Block -->

            <!-- END Private Notes Block -->
        </div>
    </div>
    <!-- END Customer Content -->


@endsection
