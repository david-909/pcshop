<!--
=========================================================
* Paper Dashboard 2 - v2.0.1
=========================================================

* Product Page: https://www.creative-tim.com/product/paper-dashboard-2
* Copyright 2020 Creative Tim (https://www.creative-tim.com)

Coded by www.creative-tim.com

 =========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!doctype html>
<html lang="en">

<head>
    @extends('inc.head')
</head>

<body>
    <!-- HEADER -->
    <header>
        @include('inc.adminheader')
    </header>
    <!-- /HEADER -->

    <!-- NAVIGATION -->



    <div class="wrapper">
        <div class="sidebar" data-color="white" data-active-color="danger">

            <div class="logo">
                <a href="https://www.creative-tim.com" class="simple-text logo-mini">
                    <!-- <div class="logo-image-small">
            <img src="./assets/img/logo-small.png">
          </div> -->
                    <!-- <p>CT</p> -->
                </a>
                <a href="{{ route('index') }}" class="simple-text logo-normal">

                    <div class="logo-image-big">
                        <img src="{{ asset('img/logo.png') }}">
                    </div>
                </a>
            </div>
            <div class="sidebar-wrapper">
                @include('inc.adminaside')
            </div>
        </div>
        <div class="main-panel" style="height: 100vh;">
            <nav id="navigation">
                @include('inc.nav')
            </nav>

            <!-- End Navbar -->
            <div class="content">
                <div class="row">
                    <div class="col-md-12">
                        @yield("content")
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!--   Core JS Files   -->
    @include('inc.adminscripts')
</body>

</html>
