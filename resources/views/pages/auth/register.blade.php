@extends('layouts.layout')
@section('title')
    PCShop - Register
@endsection
@section('content')
    <div class="w-50 d-flex justify-content-center">
        <h3 class="mb-2">Register</h3>
        <form class="w-50 d-flex justify-content-center" action="{{ route('registerpost') }}" method="POST">
            <div class="form-group col-sm-6">
                <label for="name" class="">Name:</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
                <div class="text-danger">{{ $errors->first('name') }}</div>
            </div>
            <div class="form-group col-sm-6">
                <label for="surname" class="">Surname:</label>
                <input type="text" name="surname" id="surname" class="form-control" value="{{ old('surname') }}">
                <div class="text-danger">{{ $errors->first('surname') }}</div>
            </div>
            <div class="form-group col-sm-6">
                <label for="email" class="">Email:</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}">
                <div class="text-danger">{{ $errors->first('email') }}</div>
            </div>
            <div class="form-group col-sm-6">
                <label for="username" class="">Username:</label>
                <input type="text" name="username" id="username" class="form-control" value="{{ old('username') }}">
                <div class="text-danger">{{ $errors->first('username') }}</div>
            </div>
            <div class="form-group col-sm-6">
                <label for="password" class="">Password:</label>
                <input type="password" name="password" id="password" class="form-control">
                <div class="text-danger">{{ $errors->first('password') }}</div>
            </div>
            <div class="form-group col-sm-6">
                <label for="confirmPassword" class="">Confirm password:</label>
                <input type="password" name="confirmPassword" id="confirmPassword" class="form-control">
                <div class="text-danger">{{ $errors->first('confirmPassword') }}</div>
            </div>
            <div class="form-group col-sm-4">
                <label for="phone" class="">Phone:</label>
                <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone') }}">
                <div class="text-danger">{{ $errors->first('phone') }}</div>
            </div>
            <div class="form-group col-sm-4">
                <label for="address" class="">Address:</label>
                <input type="text" name="address" id="address" class="form-control" value="{{ old('address') }}">
                <div class="text-danger">{{ $errors->first('address') }}</div>
            </div>
            <div class="form-group col-sm-4">
                <label for="address" class="">City:</label>
                <select name="city" id="city" class="form-control">
                    <option value="0">Choose</option>
                    @foreach ($cities as $city)
                        <option value="{{ $city->id }}">{{ $city->city }}</option>
                    @endforeach
                </select>
                <div class="text-danger">{{ $errors->first('city') }}</div>
            </div>


            <div class="form-group col-md-12">
                <button type="submit" id="submitMessage" class="btn btn-danger btn-block">Send</button>
            </div>
            @csrf
        </form>
    </div>
@endsection
