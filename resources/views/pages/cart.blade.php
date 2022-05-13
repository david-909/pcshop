@extends('layouts.layout')
@section('title')
    PCShop - Cart
@endsection
@section('content')
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
    <div class="row">
        <h3 class="text-center mb-2">Cart</h3>
        <div class="table-responsive col-md-10">
            <table class="table">
                <thead class=" text-primary">
                    <th>

                    </th>
                    <th>

                    </th>
                    <th>

                    </th>
                    <th>

                    </th>
                    <th>

                    </th>


                </thead>

                <tbody id="cartBody">
                    @include('partials.cart')
                </tbody>
            </table>
        </div>
        <div class="col-md-2 order-details">
            <div class="section-title text-center">
                <h4 class="title">Total</h4>
            </div>
            <div class="text-danger">
                <h5 id="totalPrice" class="text-danger text-center">${{ session()->get('totalPrice') }}</h5>
            </div>

            <form action="{{ route('order') }}" method="POST">
                <button type="submit" id="placeOrder" class="primary-btn order-submit">Place order</button>
                @csrf
            </form>
        </div>
    </div>
@endsection
