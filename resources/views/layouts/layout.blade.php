<!DOCTYPE html>
<html lang="en">
<head>
    @extends('inc.head')
</head>
<body>
<!-- HEADER -->
<header>
    @include('inc.header')
</header>
<!-- /HEADER -->

<!-- NAVIGATION -->
<nav id="navigation">
    @include('inc.nav')
</nav>
<!-- /NAVIGATION -->

{{--<!-- BREADCRUMB -->
<div id="breadcrumb" class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <h3 class="breadcrumb-header">Regular Page</h3>
                <ul class="breadcrumb-tree">
                    <li><a href="#">Home</a></li>
                    <li class="active">Blank</li>
                </ul>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /BREADCRUMB -->--}}

<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        @yield('content')
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->


<!-- FOOTER -->
<footer id="footer">
    @include('inc.footer')
</footer>
<!-- /FOOTER -->

<!-- jQuery Plugins -->
@include('inc.scripts')

</body>
</html>

