@extends("layouts.admin")
@section('title')
    Adminpanel - products
@endsection
@section('content')
    @if (session('msg'))
        <div class="text-success">{{ session('msg') }}</div>
    @endif
    @if (session('err'))
        <div class="text-danger">{{ session('err') }}</div>
    @endif
    <div class="row">
        <div class="col-md-12">
            <h4 class="text-center">Add a product</h4>
            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                <div class="form-group col-md-4">
                    <label for="product" class="">Product name:</label>
                    <input type="text" name="product" id="product" class="form-control" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="brand" class="">Brand:</label>
                    <select name="brand" class="form-control">
                        <option value="0">Choose a brand</option>
                        @foreach ($brands as $brand)
                            <option value="{{ $brand->id }}">{{ $brand->brand }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="category" class="">Category:</label>
                    <select name="category" class="form-control" id="categoryProduct" required>
                        <option value="0">Choose a category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->category }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="d-inline-flex col-md-12" id="productFilterValues">

                </div>
                <div class="form-group col-md-6">
                    <label for="quantity" class="">Quantity:</label>
                    <input type="number" class="form-control" name="quantity" id="quantity" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="price" class="">Price:</label>
                    <input type="number" class="form-control" name="price" id="price" required>
                </div>
                <div class="col-md-12 form-group" id="productFilterValues">
                    <label for="description" class="">Description:</label>
                    <textarea class="form-control" name="description" id="description" required></textarea>
                </div>
                <div class="">
                    <input type="file" name="images[]" id="image" class="form-control" multiple required>
                </div>
                <div class="form-group col-12">
                    <button type="submit" class="btn btn-block">Add</button>
                </div>
                @csrf
            </form>
        </div>
    </div>
@endsection
