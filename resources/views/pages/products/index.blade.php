@extends('layouts.layout')
@section('title')
    PCShop - Products
@endsection
@section('content')
    @include('inc.aside', ['productNo' => $productNo, 'brandNo' => $brandNo])

    <div class="col-md-9">
        @if (session('msg'))
            <div class="text-success">{{ session('msg') }}</div>
        @endif
        @if (session('err'))
            <div class="text-danger">{{ session('err') }}</div>
        @endif
        @foreach ($products as $product)
            @component('components.product', ['product' => $product])
            @endcomponent
        @endforeach
        <div class='text-center col-12'>
            {{ $products->links('pagination::bootstrap-5') }}
        </div>
    </div>
@endsection
