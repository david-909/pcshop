@extends('layouts.layout')
@section('title')
    PCShop - Products
@endsection
@section('content')
    {{-- @dd($filters) --}}
    @include('inc.aside', ['brandNo' => $brandNo, 'filters' => $filters])

    <div class="col-md-9">
        @if (session('msg'))
            <div class="text-success">{{ session('msg') }}</div>
        @endif
        @if (session('err'))
            <div class="text-danger">{{ session('err') }}</div>
        @endif
        @foreach ($productsInCategory as $product)
            @component('components.product', ['product' => $product])
            @endcomponent
        @endforeach
        <div class='justify-content-center w-100 text-center'>
            {{ $productsInCategory->links('pagination::bootstrap-5') }}
        </div>
    </div>
@endsection
