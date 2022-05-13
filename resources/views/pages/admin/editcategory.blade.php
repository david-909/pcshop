@extends("layouts.admin")
@section('title')
    Adminpanel - categories
@endsection
@section('content')
    <div class="row">
        <div class="text-success" id="msg">
            @if (session('msg'))
                {{ session('msg') }}
            @endif

        </div>
        <div class="text-danger" id="err">
            @if (session('err'))
                {{ session('err') }}
            @endif

        </div>
        <div class="col-12">
            <form method="POST" action="{{ route('updatecategory', $category->id) }}">
                <div class="form-group">
                    <label for="category" class="">Category:</label>
                    <input type="text" name="category" id="category" class="form-control"
                        value="{{ $category->category }}">
                </div>
                <div class="form-group col-12">
                    <button type="submit" class="btn btn-block">Update</button>
                </div>
                @method("PUT")
                @csrf
            </form>
        </div>
    </div>
@endsection
