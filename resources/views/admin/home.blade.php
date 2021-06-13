@extends('layouts.mainAdmin')

@section('admin', $user->name)
@section('tipo', $user->tipo)
@section('conteudo')
<div class="content-header">
    <ul class="nav-horizontal text-center">

        <li>
            <a href="{{{route('admin.verClubes')}}}"><i class="fa fa-shirtsinbulk"></i> Clubes</a>
        </li>
        <li>
            <a href="{{route('admin.novoJogo')}}"><i class="gi gi-soccer_ball"></i> Registar Jogo</a>
        </li>
        <li>
            <a href="page_ecom_products.html"><i class="gi gi-shopping_bag"></i> Products</a>
        </li>
        <li>
            <a href="page_ecom_product_edit.html"><i class="gi gi-pencil"></i> Product Edit</a>
        </li>
        <li>
            <a href="page_ecom_customer_view.html"><i class="gi gi-user"></i> Customer View</a>
        </li>
    </ul>
</div>
<!-- END eCommerce Dashboard Header -->

<!-- Quick Stats -->
<div class="row text-center">
    <div class="col-sm-6 col-lg-3">
        <a href="javascript:void(0)" class="widget widget-hover-effect2">
            <div class="widget-extra themed-background">
                <h4 class="widget-content-light"><strong>Pending</strong> Orders</h4>
            </div>
            <div class="widget-extra-full"><span class="h2 animation-expandOpen">3</span></div>
        </a>
    </div>
    <div class="col-sm-6 col-lg-3">
        <a href="javascript:void(0)" class="widget widget-hover-effect2">
            <div class="widget-extra themed-background-dark">
                <h4 class="widget-content-light"><strong>Conversion</strong> Rate</h4>
            </div>
            <div class="widget-extra-full"><span class="h2 themed-color-dark animation-expandOpen">4.7%</span></div>
        </a>
    </div>
    <div class="col-sm-6 col-lg-3">
        <a href="javascript:void(0)" class="widget widget-hover-effect2">
            <div class="widget-extra themed-background-dark">
                <h4 class="widget-content-light"><strong>Orders</strong> Today</h4>
            </div>
            <div class="widget-extra-full"><span class="h2 themed-color-dark animation-expandOpen">120</span></div>
        </a>
    </div>
    <div class="col-sm-6 col-lg-3">
        <a href="javascript:void(0)" class="widget widget-hover-effect2">
            <div class="widget-extra themed-background-dark">
                <h4 class="widget-content-light"><strong>Earnings</strong> Today</h4>
            </div>
            <div class="widget-extra-full"><span class="h2 themed-color-dark animation-expandOpen">$ 4.250</span></div>
        </a>
    </div>
</div>
<!-- END Quick Stats -->

<!-- eShop Overview Block -->

@endsection
