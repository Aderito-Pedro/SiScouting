@extends('layouts.main')

@section('admin', $user->name)
@section('conteudo')

<div class="content-header">
        <div class="header-section">
            <h1>
                <i class="gi gi-certificate"></i>Listagem das Entidades Responsavel do Clube<br><small>...</small>
            </h1>
        </div>
    </div>
    <ul class="breadcrumb breadcrumb-top">
        <li>Clube</li>
        <li><a href="">Listar Responsiveis do clube</a></li>
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

        <div class="table-responsive" >
            <div class="col-md-2" style="margin-left: 82%; margin-right: auto;">
                <a href="{{route('gest.addResponsavel')}}">
                    <button type="button" class="btn btn-block btn-primary"><i class="fa fa-plus"></i>  Novo</button>
                </a>
            </div>
            @if(count($responsavels)>0)
                <table class="table table-vcenter table-striped">
                    <thead>
                        <tr>
                            <th>Nome Completo</th>
                            <th>Email</th>
                            <th>Contacto</th>
                            <th>Categoria</th>
                            <th style="width: 150px;" class="text-center">Acção</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($responsavels as $responsavel)
                            <tr>
                                <td>{{$responsavel->nome}}</td>
                                <td>{{$responsavel->email}}</td>
                                <td>{{$responsavel->numero1}}</td>
                                <td>{{$responsavel->categoria}}</td>
                                <td class="text-center">
                                    <div class="btn-group btn-group-xs">
                                        <a href="{{route('gest.editResponsavel',$responsavel->id)}}" data-toggle="tooltip" title="Edit" class="btn btn-default"><i class="fa fa-pencil"></i></a>
                                        <a href="javascript:void(0)" data-toggle="tooltip" title="Delete" class="btn btn-danger"><i class="fa fa-times"></i></a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p class="text-center">Ainda não foi registado nenhum membro dos responsaveis da Equipa...</p>
            @endif

        </div>
    </div>


    <!-- Load and execute javascript code used only in this page -->
@endsection
<script src="js/pages/tablesDatatables.js"></script>
    <script>$(function(){ TablesDatatables.init(); });</script>
