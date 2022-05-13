@extends('layouts.layout')
@section('title')
    PCShop - About
@endsection
@section('content')
    <div class="container">
        <div>
            <img src="{{ asset('img/graphic.jpeg') }}">
            <h1 class="page-title text-white text-center">About PCshop</h1>
        </div><!-- End .page-header -->
    </div><!-- End .container -->

    <div class="page-content pb-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mb-3 mb-lg-0">
                    <h2 class="title">Our Vision</h2><!-- End .title -->
                    <p>We are a small shop run by PC enthusiasts, and we would like to help you. Feel free to contact us
                    </p>
                </div><!-- End .col-lg-6 -->
            </div><!-- End .row -->

            <div class="mb-5"></div><!-- End .mb-4 -->
        </div><!-- End .container -->
    </div><!-- End .page-content -->
@endsection
