@extends('layouts.layout')
@section('title')
    PCShop - Login
@endsection
@section('content')
    <div class="w-50 d-flex justify-content-center">
        <h3 class="mb-2">Login</h3>
        <form class="w-50 d-flex justify-content-center" action="{{ route('loginpost') }}" method="POST">

            <div class="form-group col-sm-6">
                <label for="email" class="">Email:</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}">
                <div class="text-danger">{{ $errors->first('email') }}</div>
            </div>

            <div class="form-group col-sm-6">
                <label for="password" class="">Password:</label>
                <input type="password" name="password" id="password" class="form-control">
                <div class="text-danger">{{ $errors->first('password') }}</div>
            </div>
            <div class="col-md-12">
                <p class="text-danger">
                    @if (session()->has('msg'))
                        {{ session('msg') }}
                    @endif
                </p>
            </div>
            <div class="form-group col-md-12">
                <button type="submit" id="submitLogin" class="btn btn-danger btn-block">Send</button>
            </div>
            @csrf
        </form>
    </div>
@endsection
