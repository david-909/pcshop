<div class="col-md-4">
    <div class="product">
        <div class="product-img">
            <img src="{{ asset('img/' . $product->path) }}" alt="{{ $product->product }}">
        </div>
        <div class="product-body">
            <p class="product-category">{{ $product->category }}</p>
            <h5 class="product-name" style="min-height: 50px !important;"><a
                    href="#">{{ $product->brand . ' ' . $product->product }}</a></h5>
            <h4 class="product-price">$ {{ $product->price }} </h4>
            <div class="product-rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
            </div>
            {{-- <div class="product-btns">
                <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to
                        wishlist</span></button>
                <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to
                        compare</span></button>
                <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick
                        view</span></button>
            </div> --}}
        </div>
        <div class="cartadd">
            {{-- @dd($product) --}}
            <a class="add-to-cart-btn" href="{{ route('products.show', $product->product_id) }}"> show</a>
        </div>
        @if (session()->has('user') and session('user')->id == 1)
            <div class="cartadd">
                <form action="{{ route('products.destroy', $product->product_id) }}" method="POST">
                    @csrf
                    @method("DELETE")
                    <button type="submit" class="add-to-cart-btn">Delete</button>
                </form>
            </div>
            <div class="cartadd"><a class="add-to-cart-btn"
                    href="{{ route('products.edit', $product->product_id) }}"><i class="fa fa-edit"></i>
                    edit</a>
            </div>
        @endif

    </div>
</div>
