<!-- TOP HEADER -->
<div id="top-header">
    <div class="container">
        <ul class="header-links pull-left">
            <li><a href="#"><i class="fa fa-phone"></i> +381631234567</a></li>
            <li><a href="#"><i class="fa fa-envelope-o"></i> contact@pcshop.com</a></li>
            <li><a href="#"><i class="fa fa-map-marker"></i> Street 1</a></li>
        </ul>
        {{-- @dd(session("user")) --}}
        <ul class="header-links pull-right">
            @if (session('user') && session('user')->role_id == 1)
                <li><a href="{{ route('adminpanel') }}"><i class="fa fa-user-o"></i>Adminpanel</a></li>
            @endif
            @if (session('user'))
                <li><a href="{{ route('dashboard', session('user')->id) }}"><i class="fa fa-user-o"></i> My
                        Account</a></li>
                <li>
                    <form action="{{ route('logout') }}" method="POST">
                        <button type="submit" class="filter-btn"> Logout</button>
                        @csrf
                    </form>
                </li>
            @else
                <li><a href="{{ route('login') }}"><i class="fa fa-sign-in"></i> Login</a></li>
                <li><a href="{{ route('register') }}"><i class="fa fa-registered"></i> Register</a></li>
            @endif
        </ul>
    </div>
</div>
<!-- /TOP HEADER -->

<!-- MAIN HEADER -->
<div id="header">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- LOGO -->
            <div class="col-md-3">
                <div class="header-logo">
                    <a href="#" class="logo">
                        <img src="{{ asset('img/logo.png') }}" alt="" width="220px">
                    </a>
                </div>
            </div>
            <!-- /LOGO -->

            <!-- SEARCH BAR -->
            <div class="col-md-6">
                <div class="header-search">
                    <form method="GET" action="{{ route('products.index') }}">
                        <select class="input-select">
                            <option value="0">Categories</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->category }}</option>
                            @endforeach
                        </select>
                        <input class="input" placeholder="Search here" name="search"
                            @if (request()->get('search')) value="{{ request()->get('search') }}" @endif>
                        <button class="search-btn" type="submit">Search</button>
                    </form>
                </div>
            </div>
            <!-- /SEARCH BAR -->

            <!-- ACCOUNT -->
            <div class="col-md-3 clearfix">
                <div class="header-ctn">
                    <!-- Wishlist -->
                    @if (session()->has('user'))
                        <div>
                            <a href="{{ route('wishlist') }}">
                                <i class="fa fa-heart-o"></i>
                                <span>Your Wishlist</span>
                                <div id="wishlistQty" class="qty">0</div>
                            </a>
                        </div>
                    @endif

                    <!-- /Wishlist -->

                    <!-- Cart -->
                    @if (session()->has('user'))
                        <div class="dropdown">
                            <a class="dropdown-toggle" href="{{ route('cart') }}">
                                <i class="fa fa-shopping-cart"></i>
                                <span>Your Cart</span>
                            </a>
                        </div>
                    @endif

                    <!-- /Cart -->

                    <!-- Menu Toogle -->
                    <div class="menu-toggle">
                        <a href="#">
                            <i class="fa fa-bars"></i>
                            <span>Menu</span>
                        </a>
                    </div>
                    <!-- /Menu Toogle -->
                </div>
            </div>
            <!-- /ACCOUNT -->
        </div>
        <!-- row -->
    </div>
    <!-- container -->
</div>
<!-- /MAIN HEADER -->
