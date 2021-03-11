@extends('layouts.main')

@section('admin', $user->name)
@section('conteudo')

<div class="content-header">
        <div class="header-section">
            <h1>
                <i class="fa fa-users"></i>Listagem dos Técnicos da Equipe<br><small>...</small>
            </h1>
        </div>
    </div>
    <ul class="breadcrumb breadcrumb-top">
        <li>Equipa</li>
        <li><a href="">Listar Equipe Técnica</a></li>
    </ul>
    <!-- END Datatables Header -->
    @if(session('msg'))
        <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="fa fa-check-circle"></i>  {{session('msg')}}</h4>
        </div>
    @endif

    <!-- Datatables Content -->
    <div class="block full">
        <div class="block-title">

        </div>

        <div class="table-responsive">
            <div class="col-md-2" style="margin-left: 82%; margin-right: auto;">
                <a href="{{route('gest.addTecnico')}}">
                    <button type="button" class="btn btn-block btn-primary"><i class="fa fa-plus"></i> Novo</button>
                </a>
            </div>
            @if (count($tecnicos)>0)
                <table class="table table-vcenter table-striped">
                    <thead>
                        <tr>
                            <th>Nome </th>
                            <th>Email</th>
                            <th>Data de Nascimento</th>
                            <th>Contacto</th>
                            <th>Categoria</th>
                            <th style="width: 150px;" class="text-center">Acção</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tecnicos as $tecnico)
                            <tr>
                                <td>{{$tecnico->nome}}</td>
                                <td>{{$tecnico->email}}</td>
                                <td>{{$tecnico->data_nascimento}}</td>
                                <td>{{$tecnico->contacto1}}</td>
                                <td>{{$tecnico->categoria}}</td>
                                <td class="text-center">
                                    <div class="btn-group btn-group-xs">
                                        <a href="{{route('gest.editTecnico',$tecnico->id)}}" data-toggle="tooltip" title="Edit" class="btn btn-default"><i class="fa fa-pencil"></i></a>
                                        <a href="javascript:void(0)" data-toggle="tooltip" title="Delete" class="btn btn-danger"><i class="fa fa-times"></i></a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p class="text-center">Ainda não foi registado nenhum membro da Equipe Tecnica...</p>
            @endif
        </div>
    </div>


    <!-- Load and execute javascript code used only in this page -->
@endsection
<script src="js/pages/tablesDatatables.js"></script>
    <script>$(function(){ TablesDatatables.init(); });</script>
    <script>
        $('#meuModal').on('shown.bs.modal', function () {
  $('#meuInput').trigger('focus')
})
    </script>
