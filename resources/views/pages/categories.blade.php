@extends('layouts.layout')
@section('title')
    PCShop - Categories
@endsection
@section('content')
    <div class="row">
        @foreach ($categories as $category)
            <form method="GET" action="{{ route('productsInCategory', $category->id) }}">
                <div class="col-md-2 col-xs-6">
                    <div class="product">
                        <div class="product-img">
                            <img src="{{ asset($category->image) }}" alt="{{ $category->category }} class='img-fluid'">

                        </div>
                        {{-- <div class="product-body">
                    <p class="product-category">Category</p>
                    <h3 class="product-name"><a href="#">product name goes here</a></h3>
                    <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
                    <div class="product-rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>
                    <div class="product-btns">
                        <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
                        <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
                        <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
                    </div>
                </div> --}}
                        <div class="w-100 d-flex fs-3 minheight align-items-center text-center">
                            <div>{{ $category->category }}</div>
                        </div>
                        <div class='cartadd'>
                            <button type="submit" class='filter-btn'>Show</button>
                        </div>
                    </div>
                </div>
            </form>
        @endforeach
    </div>
@endsection
