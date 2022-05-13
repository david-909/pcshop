@extends('layouts.layout')
@section('title')
    PCShop - My orders
@endsection
@section('content')
    @php
    $counter = 1;
    @endphp
    {{-- @dd(session("user")) --}}
    <div class="row">
        @if (session()->has('user'))
            @forelse ($orders as $i=>$order)
                <div class="mt-2"></div>
                <div class="col-md-6">
                    <div class="card card-dashboard">
                        <div class="card-body">
                            <h5 class="card-title">Order #{{ $counter++ }} : </h5><br>
                            <!-- End .card-title -->
                            <p>
                                <span class="h6">Products: </span><br>

                            <ul>
                                @foreach ($order->products as $product)
                                    <li><span
                                            class="h6">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;{{ $product->product }}
                                            ({{ $product->quantity }})
                                        </span></li>
                                @endforeach
                            </ul>
                            <span class="h6">Total Price:&nbsp;</span>${{ $order->total }} <br>
                            <span class="h6">Address:&nbsp;</span>{{ session('user')->address }}<br>
                            <span class="h6">Phone:&nbsp;</span>{{ session('user')->phone }}<br>
                            <span class="h6">Order datetime:&nbsp;</span>{{ $order->created_at }}<br>
                            </p>
                        </div><!-- End .card-body -->
                    </div><!-- End .card-dashboard -->
                </div><!-- End .col-lg-6 -->
            @empty

                <p>You have not made any orders.</p>
                <a href="{{ route('products.index') }}" class="btn btn-outline-primary-2"><span>GO SHOP</span><i
                        class="icon-long-arrow-right"></i></a>
            @endforelse
    </div><!-- End .row -->
    @endif
@endsection
