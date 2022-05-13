@extends('layouts.layout')
@section('title')
    PCShop - @foreach ($product->brand as $brand)
        {{ $brand->brand }}
    @endforeach
    {{ $product->product }}
@endsection
@section('content')
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- Product main img -->

                <div class="col-md-5 col-md-push-2">
                    <div id="product-main-img">
                        @foreach ($product->images as $image)
                            @component('components.show-product-image', ['image' => $image])
                            @endcomponent
                        @endforeach

                    </div>
                </div>
                <!-- /Product main img -->

                <!-- Product thumb imgs -->
                <div class="col-md-2  col-md-pull-5">
                    <div id="product-imgs">

                        @foreach ($product->images as $image)
                            @component('components.show-product-image', ['image' => $image])
                            @endcomponent
                        @endforeach
                    </div>
                </div>
                <!-- /Product thumb imgs -->

                <!-- Product details -->
                {{-- @dd($product) --}}
                <div class="col-md-5">
                    <div class="product-details">
                        <h2 class="product-name">
                            @foreach ($product->brand as $brand)
                                {{ $brand->brand }}
                            @endforeach
                            {{ $product->product }}
                        </h2>
                        <div>
                            <div class="product-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                            <a class="review-link" href="#">Add your review</a>
                        </div>
                        <div>
                            <h3 class="product-price">
                                {{ $product->price->price }}

                            </h3>
                            <span class="product-available">In Stock:
                                {{ $product->quantity }}
                            </span>
                        </div>




                        <div class="add-to-cart">

                            @if (session()->has('user'))
                                <button class="add-to-cart-btn" id="addToCart" data-id="{{ $product->id }}"><i
                                        class="fa fa-shopping-cart"></i> add to
                                    cart</button>
                            @endif
                        </div>

                        <ul class="product-btns">
                            <li class="addToWishlist" data-id="{{ $product->id }}"
                                @if (session()->has('user')) data-user="{{ session('user')->id }}" @endif>
                                @if (session()->has('user'))
                                    <a><i class="fa fa-heart-o"></i> add
                                        to wishlist</a>
                                @endif
                            </li>
                        </ul>
                        <ul class="product-links">
                            <li>Category:</li>
                            {{ $product->category['category'] }}
                        </ul>



                    </div>
                </div>
                <!-- /Product details -->
                {{-- @dd($product) --}}
                <!-- Product tab -->
                <div class="col-md-12">
                    <div id="product-tab">
                        <!-- product tab nav -->
                        <ul class="tab-nav">
                            <li class="active"><a data-toggle="tab" href="#tab1">Description</a></li>
                            <li><a data-toggle="tab" href="#tab3">Reviews</a></li>
                        </ul>
                        <!-- /product tab nav -->

                        <!-- product tab content -->
                        <div class="tab-content">
                            <!-- tab1  -->
                            <div id="tab1" class="tab-pane fade in active">
                                <div class="row">
                                    <div class="col-md-12">
                                        <p>{{ $product->description }}
                                        <p>
                                    </div>
                                </div>
                            </div>
                            <!-- /tab1  -->

                            <!-- tab2  -->
                            <!-- /tab2 -->

                            <!-- tab3  -->
                            <div id="tab3" class="tab-pane fade in">
                                <div class="row">
                                    <!-- Rating -->
                                    <div class="col-md-3">
                                        <div id="rating">
                                            <div class="rating-avg">
                                                <span>{{ $average }}</span>
                                                @if ($average >= 4.5)
                                                    <div class="rating-stars">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                @endif
                                                @if ($average < 4.5 and $average >= 3.5)
                                                    <div class="rating-stars">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                @endif
                                                @if ($average < 3.5 and $average >= 2.5)
                                                    <div class="rating-stars">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                @endif
                                                @if ($average < 2.5 and $average >= 1.5)
                                                    <div class="rating-stars">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                @endif
                                                @if ($average < 1.5)
                                                    <div class="rating-stars">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                @endif

                                            </div>
                                        </div>
                                    </div>
                                    <!-- /Rating -->

                                    <!-- Reviews -->
                                    <div class="col-md-6">
                                        <div id="reviews">
                                            <ul class="reviews" id="reviewsul">
                                                @foreach ($reviews as $review)
                                                    <li>
                                                        <div class="review-heading">
                                                            <h6 class="name">
                                                                {{ $review->name . ' ' . $review->surname }}</h6>
                                                            <p class="date">
                                                                {{ date('m-d-Y', $review->date->getTimestamp()) }}</p>
                                                            @if ($review->mark_id == 1)
                                                                <div class="review-rating">
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star-o"></i>
                                                                    <i class="fa fa-star-o"></i>
                                                                    <i class="fa fa-star-o"></i>
                                                                    <i class="fa fa-star-o"></i>
                                                                </div>
                                                            @endif
                                                            @if ($review->mark_id == 2)
                                                                <div class="review-rating">
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star-o"></i>
                                                                    <i class="fa fa-star-o"></i>
                                                                    <i class="fa fa-star-o"></i>
                                                                </div>
                                                            @endif
                                                            @if ($review->mark_id == 3)
                                                                <div class="review-rating">
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star-o"></i>
                                                                    <i class="fa fa-star-o"></i>
                                                                </div>
                                                            @endif
                                                            @if ($review->mark_id == 4)
                                                                <div class="review-rating">
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star-o"></i>
                                                                </div>
                                                            @endif
                                                            @if ($review->mark_id == 5)
                                                                <div class="review-rating">
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                </div>
                                                            @endif

                                                        </div>
                                                        <div class="review-body">
                                                            <p>{{ $review->review }}
                                                            </p>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- /Reviews -->

                                    <!-- Review Form -->
                                    <div class="col-md-3">
                                        @if (session()->has('user'))
                                            <div id="review-form">
                                                <form class="review-form">
                                                    <textarea class="input" id="reviewArea" placeholder="Your Review" rows="15"></textarea>
                                                    <div class="input-rating">
                                                        <span>Your Rating: </span>
                                                        <div class="stars">
                                                            <input id="star5" name="rating" value="5" type="radio"><label
                                                                for="star5"></label>
                                                            <input id="star4" name="rating" value="4" type="radio"><label
                                                                for="star4"></label>
                                                            <input id="star3" name="rating" value="3" type="radio"><label
                                                                for="star3"></label>
                                                            <input id="star2" name="rating" value="2" type="radio"><label
                                                                for="star2"></label>
                                                            <input id="star1" name="rating" value="1" type="radio"><label
                                                                for="star1"></label>
                                                        </div>
                                                    </div>
                                                    <input type="hidden" id="productId" value="{{ $product->id }}">
                                                    <button class="primary-btn" id="postReview">Submit</button>
                                                </form>
                                                <div id="errorReview" class="text-danger"></div>
                                            </div>
                                        @endif
                                    </div>
                                    <!-- /Review Form -->
                                </div>
                            </div>
                            <!-- /tab3  -->
                        </div>
                        <!-- /product tab content  -->
                    </div>
                </div>
                <!-- /product tab -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
@endsection
