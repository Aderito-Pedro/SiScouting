@extends('layouts.mainC')

@section('admin', $user->name)
@section('tipo', $user->tipo)
@section('conteudo')


<div class="content-header content-header-media">
    <div class="header-section">
        <div class="row">
            <!-- Main Title (hidden on small devices for the statistics to fit) -->
            <div class="col-md-4 col-lg-6 hidden-xs hidden-sm">
                <h1>Bem Vindo ao<strong> SiScouting</strong><br><small>O sistema de Scaouting de Tatica</small></h1>
            </div>
            <!-- END Main Title -->

            <!-- Top Stats -->
            <!-- END Top Stats -->
        </div>
    </div>
    <!-- For best results use an image with a resolution of 2560x248 pixels (You can also use a blurred image with ratio 10:1 - eg: 1000x100 pixels - it will adjust and look great!) -->
    <img src="/img/placeholders/headers/yha.jpg" alt="header image" class="animation-pulseSlow">
</div>
<div class="content-header">
    <ul class="nav-horizontal text-center">
        <li>
            <a href="#"><i class="gi gi-soccer_ball"></i> Registar Jogo</a>
        </li>
        <li>
            <a href="page_ecom_orders.html"><i class="gi gi-shop_window"></i> Orders</a>
        </li>
        <li>
            <a href="page_ecom_order_view.html"><i class="gi gi-shopping_cart"></i> Order View</a>
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

@endsection
