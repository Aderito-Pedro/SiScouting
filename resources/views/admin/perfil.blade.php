@extends('layouts.mainAdmin')

@section('admin', $user->name)
@section('tipo', $user->tipo)
@section('conteudo')

<div class="content-header content-header-media">
    <div class="header-section">
        <img src="img/placeholders/avatars/avatar2.jpg" alt="Avatar" class="pull-right img-circle">
        <h1>{{$user->name}} <br><small>Definições de Perfil</small></h1>
    </div>
    <!-- For best results use an image with a resolution of 2560x248 pixels (You can also use a blurred image with ratio 10:1 - eg: 1000x100 pixels - it will adjust and look great!) -->
    <img src="img/placeholders/headers/profile_header.jpg" alt="header image" class="animation-pulseSlow">
</div>

<div class="row">

    <div class="col-lg-12">
        <!-- Orders Block -->
        <div class="block">
            <!-- Orders Title -->
            <div class="block-title">

                <h2><i class="fa fa-truck"></i> <strong>Orders</strong> (4)</h2>
            </div>
            <!-- END Orders Title -->

            <!-- Orders Content -->
            <table class="table table-bordered table-striped table-vcenter">
                <tbody>
                    <tr>
                        <td style="width: 50%;"><strong>Nome de Utilizador: </strong></td>
                        <td>{{$user->name}}</td>
                    </tr>
                    <tr>
                        <td ><strong>Email: </strong></td>
                        <td>{{$user->email}}</td>
                    </tr>

                </tbody>
            </table>
            <!-- END Orders Content -->
            <div class="modal-footer">
                <a href="#"><button type="button" class="btn btn-sm btn-primary"><i class="fa fa-pencil-square-o"></i> Editar os Dados</button></a>
            </div>
            <br>
        </div>
        <!-- END Orders Block -->

        <!-- Products in Cart Block -->
        <!-- END Private Notes Block -->
    </div>
</div>


@endsection
