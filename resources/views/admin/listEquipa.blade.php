@extends('layouts.mainAdmin')

@section('admin', $user->name)
@section('tipo', $user->tipo)
@section('conteudo')

<div class="content-header">
        <div class="header-section">
            <h1>
                <i class="fa fa-shirtsinbulk"></i>Listagem dos Clube<br><small>...</small>
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
            @if (count($clubes)>0)
                <table class="table table-vcenter table-striped">
                    <thead>
                        <tr>
                            <th>Emblema</th>
                            <th>Clube </th>
                            <th>Email</th>
                            <th>Escalão</th>
                            <th style="width: 150px;" class="text-center">Acção</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($clubes as $clube)
                            <tr>
                                <td class="text-center">
                                    <div class="user-avatar">
                                        <img src="img/siscout/clube/{{{$clube->emblema != NULL ? $clube->emblema : "SiscOUTING_CLUBE.png"}}}" alt="avatar" class="img-circle" style="height: 55px;width: 55px;">
                                    </div>
                                </td>
                                <td>{{{$clube->clube}}}</td>
                                <td>{{{$clube->email}}}</td>
                                <td>{{{$clube->escalao}}}</td>
                                <td class="text-center">
                                    <div class="btn-group btn-group-xs">
                                        <a href="{{route('admin.clube',$clube->id)}}" data-toggle="tooltip" title="Ver Clube" class="btn btn-default"><i class="fa fa-user"></i></a>
                                        <a href="javascript:void(0)" data-toggle="tooltip" title="Delete" class="btn btn-danger"><i class="fa fa-times"></i></a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p class="text-center">Ainda não foi registado nenhum Clube...</p>
            @endif
        </div>
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
