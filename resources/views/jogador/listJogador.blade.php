@extends('layouts.main')

@section('admin', $user->name)
@section('conteudo')

<div class="content-header">
        <div class="header-section">
            <h1>
                <i class="fa fa-street-view"></i>Listagem dos Jogadores<br><small>...</small>
            </h1>
        </div>
    </div>
    <ul class="breadcrumb breadcrumb-top">
        <li>Jogadores</li>
        <li><a href="">Listar Jogadores</a></li>
    </ul>
    <!-- END Datatables Header -->

    <!-- Datatables Content -->
    <div class="block full">
    <div class="row">
        <div class="col-md-2" style="margin-left: 82%; margin-right: auto;">
            <a href="{{route('jogador.addJogador')}}">
                <button type="button" class="btn btn-block btn-primary"><i class="fa fa-plus"></i> Novo</button>
            </a>
        </div>
    </div>
    <br>
    @if(count($jogadores)>0)
        <div class="row">
            <div class="table-responsive">

                <table id="example-datatable" class="table table-vcenter table-condensed table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center"><i class="gi gi-user"></i></th>
                            <th>Nome Completo</th>
                            <th>Apelido</th>
                            <th>Email</th>
                            <th>Contacto</th>
                            <th class="text-center">Acção</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($jogadores as $jogador)
                            <tr>
                                <td class="text-center">
                                    <div class="user-avatar">
                                        <img src="img/siscout/jogador/{{$jogador->img != NULL ? $jogador->img : "avatar.jpg"}}" alt="avatar" class="img-circle" style="height: 55px;width: 55px;">
                                    </div>
                                </td>
                                <td>{{ $jogador->nome}}</td>
                                <td>{{ $jogador->apelido}}</td>
                                <td>{{ $jogador->email}}</td>
                                <td>9666666666</td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a href="{{route('jogador.perfil',$jogador->id)}}" data-toggle="tooltip" title="Perfil do Jogador" class="btn btn-xs btn-default"><i class="gi gi-user"></i></a>
                                        <a href="{{route('jogador.editJogador',$jogador->id)}}" data-toggle="tooltip" title="Editar Dados Jogador" class="btn btn-xs btn-default"><i class="fa fa-pencil"></i></a>
                                        <a href="javascript:void(0)" data-toggle="tooltip" title="Delete Jogador" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @else
        <p class="text-center">Ainda não foi registado nenhum Jogador...</p>
    @endif

</div>

    <!-- Load and execute javascript code used only in this page -->
@endsection
<script src="js/pages/tablesDatatables.js"></script>
    <script>$(function(){ TablesDatatables.init(); });</script>
