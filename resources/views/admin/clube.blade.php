@extends('layouts.mainAdmin')

@section('admin', $user->name)
@section('tipo', $user->tipo)
@section('conteudo')


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
                    <h2><strong>Clube</strong> Desportivo</h2>
                </div>
                <!-- END Customer Info Title -->

                <!-- Customer Info -->
                <div class="block-section text-center">
                    <a href="javascript:void(0)">
                        <div class="col-sm-12 block-section text-center">
                            <img src="img/siscout/clube/{{$clube->emblema != NULL ? $clube->emblema : "SiscOUTING_CLUBE.png"}}" class="img-responsive" alt="image">
                        </div>
                    </a>
                    <h3>
                        <strong>{{$clube->clube}}</strong><br><small></small>
                    </h3>
                </div>

            </div>
            <!-- END Customer Info Block -->

            <!-- Quick Stats Block -->

        </div>
        <div class="col-lg-8">
            <!-- Orders Block -->
            <div class="block">
                <!-- Info Title -->
                <div class="block-title">

                    <h2><strong>Identificação dos Quadros do Clube</strong> </h2>
                </div>
                <!-- END Info Title -->

                <!-- Info Content -->
                <table class="table table-borderless table-striped">
                    <tbody>
                        <tr>
                            <td style="width: 20%;"><strong>Clube</strong></td>
                            <td>{{ $clube->clube }}</td>
                        </tr>
                        <tr>
                            <td><strong>Ecalão</strong></td>
                            <td>{{$clube->escalao}}</td>
                        </tr>
                        <tr>
                            <td><strong>Endereço</strong></td>
                            <td>{{$endereco}}</td>
                        </tr>
                        <tr>
                            <td><strong>Telefone</strong></td>


                                <td>{{$clube->telefone1}}; {{$clube->telefone2 != NULL ? $clube->telefone2.";" :""}}</td>
                        </tr>
                        <tr>
                            <td><strong>Email</strong></td>
                            <td>{{$clube->email}}</td>
                        </tr>
                    </tbody>
                </table>
                <!-- END Info Content -->
            </div>
        </div>
    </div>
</div>
    <!-- END Customer Content -->


@endsection
