<ul class="nav">
    <li>
        <a href="{{ route('adminpanel') }}">
            <i class="nc-icon nc-chart-pie-36"></i>
            <p>Stats</p>
        </a>
    </li>
    <li>
        <a href="{{ route('products.create', ['id' => 1]) }}">
            <i class="nc-icon nc-shop"></i>
            <p>Products</p>
        </a>
    </li>
    <li>
        <a href="{{ route('filters') }}">
            <i class="nc-icon nc-hat-3"></i>
            <p>Filters</p>
        </a>
    </li>
    <li>
        <a href="{{ route('getcategories') }}">
            <i class="nc-icon nc-box-2"></i>
            <p>Categories</p>
        </a>
    </li>
    <li>
        <a href="{{ route('misc') }}">
            <i class="nc-icon nc-globe"></i>
            <p>Misc</p>
        </a>
    </li>
</ul>
