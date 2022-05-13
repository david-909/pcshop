@extends("layouts.admin")
@section('title')
    Adminpanel - categories
@endsection
@section('content')
    @if (session('msg'))
        <div class="text-success">{{ session('msg') }}</div>
    @endif
    @if (session('err'))
        <div class="text-danger">{{ session('err') }}</div>
    @endif
    <div class="row">
        <div class="col-12">
            <form action="{{ route('insertcategory') }}" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="category" class="">Category:</label>
                    <input type="text" name="category" id="category" class="form-control">
                </div>
                <div>
                    <label for="image" class="">Image:</label>
                    <input type="file" name="image" id="image" class="form-control">
                </div>
                <div class="form-group col-12">
                    <button type="submit" class="btn btn-block">Add</button>
                </div>
                @csrf
            </form>
        </div>
    </div>
@endsection
