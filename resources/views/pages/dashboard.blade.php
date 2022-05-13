@extends('layouts.layout')
@section('title')
    PCShop - Dashboard
@endsection
@section('content')
    {{-- @dd(session("user")) --}}
    @if (session()->has('user'))
        <h3 class='text-center'>My account <a href="{{ route('orders') }}" class="pull-right h6">My orders</a></h3>
        <div class="w-50 d-flex justify-content-center">
            <form class="w-50 d-flex justify-content-center" action="{{ route('updateUser', $id = session('user')->id) }}"
                method="POST">

                <div class="form-group col-md-4">
                    <label for="newName" class="">Name:</label>
                    <input type="text" name="newName" id="newName" class="form-control"
                        value="{{ old('newName') ? old('newName') : session('user')->name }}">
                    <div class="text-danger">{{ $errors->first('newName') }}</div>
                </div>
                <div class="form-group col-md-4">
                    <label for="newSurname" class="">Surname:</label>
                    <input type="text" name="newSurname" id="newSurname" class="form-control"
                        value="{{ old('newSurname') ? old('newSurname') : session('user')->surname }}">
                    <div class="text-danger">{{ $errors->first('newSurname') }}</div>
                </div>
                <div class="form-group col-md-4">
                    <label for="newEmail" class="">Email:</label>
                    <input type="text" name="newEmail" id="newEmail" class="form-control"
                        value="{{ old('newEmail') ? old('newEmail') : session('user')->email }}">
                    <div class="text-danger">{{ $errors->first('newEmail') }}</div>
                </div>
                <div class="form-group col-md-4">
                    <label for="newUsername" class="">Username:</label>
                    <input type="text" name="newUsername" id="newUsername" class="form-control"
                        value="{{ old('newUsername') ? old('newUsername') : session('user')->username }}">
                    <div class="text-danger">{{ $errors->first('newUsername') }}</div>
                </div>
                <div class="form-group col-md-4">
                    <label for="newAddress" class="">Address:</label>
                    <input type="text" name="newAddress" id="newAddress" class="form-control"
                        value="{{ old('newAddress') ? old('newAddress') : session('user')->address }}">
                    <div class="text-danger">{{ $errors->first('newAddress') }}</div>
                </div>
                <div class="form-group col-md-4">
                    <label for="newPhone" class="">Phone:</label>
                    <input type="text" name="newPhone" id="newPhone" class="form-control"
                        value="{{ old('newPhone') ? old('newPhone') : session('user')->phone }}">
                    <div class="text-danger">{{ $errors->first('newPhone') }}</div>
                </div>
                <div class="form-group col-md-4">
                    <label for="newCity" class="">City:</label>
                    <select class="form-control" name='newCity'>

                        @foreach ($cities as $city)
                            {{-- //! NAMESTITI DA SE PAMTI I SELECT --}}
                            @if ($city->city == session('user')->city)
                                <option value="{{ $city->id }}" selected>{{ $city->city }}</option>
                            @else
                                <option value="{{ $city->id }}">{{ $city->city }}</option>
                            @endif
                        @endforeach
                    </select>
                    <div class="text-danger">{{ $errors->first('newCity') }}</div>
                </div>
                <div class="form-group col-md-4">
                    <label for="newPassword" class="">New password:</label>
                    <input type="password" name="newPassword" id="newPassword" class="form-control">
                    <div class="text-danger">{{ $errors->first('newPassword') }}</div>
                </div>
                <div class="form-group col-md-4">
                    <label for="newPasswordRepeat" class="">New password repeat:</label>
                    <input type="password" name="newPasswordRepeat" id="newPasswordRepeat" class="form-control">
                    <div class="text-danger">{{ $errors->first('newPasswordRepeat') }}</div>
                </div>

                <div class="form-group col-md-12">
                    <button type="submit" id="submitUpdate" class="btn btn-danger btn-block">Update</button>
                </div>
                @method("PUT")
                @csrf
            </form>

            {{-- @dd($orders) --}}
        </div>
    @endif
@endsection
