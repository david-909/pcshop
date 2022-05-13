@extends("layouts.admin")
@section('title')
    Adminpanel - cities
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <form action="{{ route('insertcity') }}" method="POST">
                <div class="form-group">
                    <label for="city" class="">City:</label>
                    <input type="text" name="city" id="city" class="form-control">
                </div>
                <div class="form-group col-12">
                    <button type="submit" class="btn btn-block">Add</button>
                </div>
                @csrf
            </form>
        </div>
    </div>
@endsection
