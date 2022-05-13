@extends('layouts.layout')
@section('title')
    PCShop - Contact
@endsection
@section('content')
    <div class="w-50 d-flex justify-content-center">
        <form class="w-50 d-flex justify-content-center" action="{{ route('sendmail') }}" method="GET">
            <div class="form-group col-md-4">
                <label for="name" class="">Name:</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
                <div class="text-danger">{{ $errors->first('name') }}</div>
            </div>
            <div class="form-group col-md-4">
                <label for="name" class="">Surname:</label>
                <input type="text" name="surname" id="surname" class="form-control" value="{{ old('surname') }}">
                <div class="text-danger">{{ $errors->first('surname') }}</div>
            </div>
            <div class="form-group col-md-4">
                <label for="name" class="">Email:</label>
                <input type="text" name="email" id="surname" class="form-control" value="{{ old('email') }}">
                <div class="text-danger">{{ $errors->first('email') }}</div>
            </div>
            <div class="form-group col-md-12">
                <label for="name" class="">Message:</label>
                <textarea class="form-control" name="message">{{ old('message') }}</textarea>
                <div class="text-danger">{{ $errors->first('message') }}</div>
            </div>
            <div class="form-group col-md-12">
                <button type="submit" id="submitMessage" class="btn btn-danger btn-block">Send</button>
            </div>
            @csrf
        </form>
    </div>
@endsection
