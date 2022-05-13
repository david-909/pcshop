<form method="GET" action="{{ route('products.index') }}" id="FORMAA">
    <div id="aside" class="col-md-3">
        <!-- aside Widget -->

        @if (Route::current()->getName() === 'products.index')
            <div class="aside">
                <h3 class="aside-title">Categories</h3>
                <div class="checkbox-filter">

                    @foreach ($categories as $category)
                        @component('components.filter-checkbox', ['category' => $category, 'productno' =>
                            $productNo[$loop->index]])
                        @endcomponent
                    @endforeach

                </div>
            </div>
        @endif

        <!-- /aside Widget -->

        <!-- aside Widget -->
        <div class="aside">
            <h3 class="aside-title">Price</h3>
            <div class="price-filter">
                <div id="price-slider"></div>
                <div class="input-number price-min">
                    <input id="price-min" type="number">
                    <span class="qty-up">+</span>
                    <span class="qty-down">-</span>
                </div>
                <span>-</span>
                <div class="input-number price-max">
                    <input id="price-max" type="number">
                    <span class="qty-up">+</span>
                    <span class="qty-down">-</span>
                </div>
            </div>
        </div>
        <!-- /aside Widget -->

        <!-- aside Widget -->
        {{-- @dd($brandNo) --}}
        <div class="aside">
            <h3 class="aside-title">Brand</h3>
            <div class="checkbox-filter">
                @foreach ($brands as $brand)
                    @component('components.filter-brand', ['brand' => $brand, 'brandNo' => $brandNo])
                    @endcomponent
                @endforeach

            </div>
        </div>
        <!-- /aside Widget -->

        <!-- aside Widget -->

        <!-- /aside Widget -->
        <button type="submit" class="filter-btn">Filter</button>
    </div>
</form>
