@extends("layouts.admin")
@section('title')
    Adminpanel - filters
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <form action="{{ route('insertfilter') }}" method="POST">
                <div class="form-group">
                    <label for="filter" class="">Filter:</label>
                    <input type="text" name="filter" id="filter" class="form-control">
                </div>
                <div class="form-group col-12">
                    <button type="submit" class="btn btn-block">Add</button>
                </div>
                @csrf
            </form>
        </div>
    </div>
@endsection
