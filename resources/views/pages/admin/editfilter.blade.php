@extends("layouts.admin")
@section('title')
    Adminpanel - filters
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <form method="POST" action="{{ route('updatefilter', $filter->id) }}">
                <div class="form-group">
                    <label for="filter" class="">Filter:</label>
                    <input type="text" name="filter" id="filter" class="form-control" value="{{ $filter->filter }}">
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
