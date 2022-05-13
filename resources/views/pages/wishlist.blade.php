@extends('layouts.layout')
@section('title')
    PCShop - Categories
@endsection
@section('content')
    <h3 class="text-center mb-2">Wishlist</h3>
    {{-- @dd($products) --}}
    @forelse ($products  as $p)
        <div class="row d-flex mt-2">
            <div class="col-md-3">
                <img width="80px" class="img-fluid" src="{{ asset('img/' . $p->image) }}" alt="{{ $p->name }}">
            </div>
            <div class="col-md-3">
                <p>{{ $p->name }}</p>
            </div>
            <div class="col-md-2">
                <p>${{ $p->price }}</p>
            </div>
            <div class="col-md-2">
                <p>Stock: {{ $p->quantity }}</p>
            </div>
            <div class="col-md-1">
                <button class="filter-btn"><i class="fa fa-shopping-cart"></i> </button>
            </div>
            <div class="col-md-1">
                <button class="filter-btn">X</button>
            </div>
        </div>
    @empty
        <h3>No products in your wishlist</h3>
    @endforelse
@endsection
