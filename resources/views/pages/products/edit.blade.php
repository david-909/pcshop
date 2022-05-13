@extends('layouts.layout')
@section('title')
    PCShop - Edit
@endsection
@section('content')
    <div class="section">
        <!-- container -->
        <div class="container">
            @if (session('msg'))
                <div class="text-success">{{ session('msg') }}</div>
            @endif
            @if (session('err'))
                <div class="text-danger">{{ session('err') }}</div>
            @endif
            <!-- row -->
            <div class="row">
                <!-- Product main img -->

                <div class="col-md-5 col-md-push-2">
                    <div id="product-main-img">
                        @foreach ($product->images as $image)
                            @component('components.show-product-image', ['image' => $image])
                            @endcomponent
                        @endforeach

                    </div>
                </div>
                <!-- /Product main img -->

                <!-- Product thumb imgs -->
                <div class="col-md-2  col-md-pull-5">
                    <div id="product-imgs">

                        @foreach ($product->images as $image)
                            @component('components.show-product-image', ['image' => $image])
                            @endcomponent
                        @endforeach
                    </div>
                </div>
                <div class="col-md-5">
                    {{-- @dd($brands) --}}
                    <form method="POST" action="{{ route('products.update', $product->id) }}">
                        @csrf
                        @method("PUT")
                        <div class="form-group">
                            <label for="product" class="">Brand:</label>
                            <select name="brand" class="form-control">
                                @foreach ($brands as $brand)
                                    @if ($brand->id == $product->brand_id)
                                        <option value="{{ $brand->id }}" selected>{{ $brand->brand }}</option>
                                    @else
                                        <option value="{{ $brand->id }}">{{ $brand->brand }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="product" class="">Product name:</label>
                            <input type="text" name="product" id="product" class="form-control"
                                value="{{ $product->product }}" required>
                        </div>
                        <div class="form-group">
                            <label for="price" class="">Price:</label>
                            <input type="text" name="price" id="price" class="form-control"
                                value="{{ $product->price->price }}" required>
                        </div>
                        <div class="form-group">
                            <label for="quantity" class="">Quantity:</label>
                            <input type="number" name="quantity" id="quantity" class="form-control"
                                value="{{ $product->quantity }}" required>
                        </div>
                        <div class="form-group">
                            <label for="description" class="">Description:</label>
                            <textarea name="description" class="form-control">{{ $product->description }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-dark">Update</button>
                    </form>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
@endsection
