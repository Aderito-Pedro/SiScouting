@extends('layouts.main')

@section('admin', $user->name)
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
                            <img src="img/placeholders/photos/photo4.jpg" class="img-responsive" alt="image">
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
                            @foreach($telefones as $telefone)
                                <td>{{$telefone->numero}};</td>
                            @endforeach
                        </tr>
                        <tr>
                            <td><strong>Email</strong></td>
                            <td>{{$clube->email}}</td>
                        </tr>
                    </tbody>
                </table>
                <!-- END Info Content -->
            </div>

            <div class="block">
                <!-- Orders Title -->
                <div class="block-title">
                    <div class="block-options pull-right">
                       <h2><strong>Objetivos de cada Competição</strong></h2>
                    </div>
                    <h2><strong>Copetições a disputar</strong></h2>
                </div>
                <!-- END Orders Title -->

                <!-- Orders Content -->
                <table class="table table-bordered table-striped table-vcenter">
                    <tbody>
                        <tr>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
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

                    <h2><strong>Responsaveis do Clube</strong></h2>
                </div>
                <!-- END Products in Cart Title -->

                <!-- Products in Cart Content -->
                <table class="table table-bordered table-striped table-vcenter">
                    <tbody>
                        <tr>
                            <th class="text-center" style="width: 100px;" rowspan="2">Presidente</th>
                            <td > Adérito António Quidissala Pedro</td>
                            <td><span class="group-addon"><i class="fa fa-phone"> </i></span> 935994147</td>
                            <tr>
                                <td colspan="2"><span class="group-addon"><i class="fa fa-at"></i> </i></span>Email</td>

                            </tr>
                        </tr>
                    </tbody>
                </table>
                <!-- END Products in Cart Content -->
            </div>
            <!-- END Products in Cart Block -->
            <div class="block">
                <!-- Products in Cart Title -->
                <div class="block-title">

                    <h2><strong>Equipa Técnica</strong></h2>
                </div>
                <!-- END Products in Cart Title -->

                <!-- Products in Cart Content -->
                <table class="table table-bordered table-striped table-vcenter">
                    <tbody>
                        <tr>
                            <th class="text-center" style="width: 100px;" rowspan="2">Treinador</th>
                            <td > Adérito António Quidissala Pedro</td>
                            <td><span class="group-addon"><i class="fa fa-phone"> </i></span> 935994147</td>
                            <tr>
                                <td colspan="2"><span class="group-addon"><i class="fa fa-at"></i> </i></span>Email</td>

                            </tr>
                        </tr>
                    </tbody>
                </table>
                <!-- END Products in Cart Content -->
            </div>
            <!-- Customer Addresses Block -->
            <!-- END Customer Addresses Block -->
            <div class="block">
                <!-- Products in Cart Title -->
                <div class="block-title">

                    <h2><strong>Outros Quadros</strong></h2>
                </div>
                <!-- END Products in Cart Title -->

                <!-- Products in Cart Content -->
                <table class="table table-bordered table-striped table-vcenter">
                    <tbody>
                        <tr>
                            <th class="text-center" style="width: 100px;" rowspan="2">Médico</th>
                            <td > Adérito António Quidissala Pedro</td>
                            <td><span class="group-addon"><i class="fa fa-phone"> </i></span> 935994147</td>
                            <tr>
                                <td colspan="2"><span class="group-addon"><i class="fa fa-at"></i> </i></span>Email</td>

                            </tr>
                        </tr>
                    </tbody>
                </table>
                <!-- END Products in Cart Content -->
            </div>
            <!-- Referred Members Block -->
            <div class="block">
                <!-- Referred Members Title -->
                <div class="block-title">
                    <h2><i class="fa fa-group"></i> <strong>Referred</strong> Members (2)</h2>
                </div>
                <!-- END Referred Members Title -->

                <!-- Referred Members Content -->
                <div class="row">
                    <div class="col-lg-6">
                        <a href="javascript:void(0)" class="widget widget-hover-effect2 themed-background-muted-light">
                            <div class="widget-simple">
                                <img src="img/placeholders/avatars/avatar12.jpg" alt="avatar" class="widget-image img-circle pull-left">
                                <h4 class="widget-content text-right">
                                    <strong>Julia Warren</strong>
                                    <small>Orders Value: <strong>$280,00</strong></small>
                                </h4>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-6">
                        <a href="javascript:void(0)" class="widget widget-hover-effect2 themed-background-muted-light">
                            <div class="widget-simple">
                                <img src="img/placeholders/avatars/avatar2.jpg" alt="avatar" class="widget-image img-circle pull-left">
                                <h4 class="widget-content text-right">
                                    <strong>Kyle Ross</strong>
                                    <small>Orders Value: <strong>$780,00</strong></small>
                                </h4>
                            </div>
                        </a>
                    </div>
                </div>
                <!-- END Referred Members Content -->
            </div>
            <!-- END Referred Members Block -->

            <!-- Private Notes Block -->

            <!-- END Private Notes Block -->
        </div>
    </div>
    <!-- END Customer Content -->


@endsection
