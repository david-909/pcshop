@extends("layouts.admin")
@section('title')
    Adminpanel - cities
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <form method="POST" action="{{ route('updatecity', $city->id) }}">
                <div class="form-group">
                    <label for="city" class="">City:</label>
                    <input type="text" name="city" id="city" class="form-control" value="{{ $city->city }}">
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
