@include('partial._header')
<body>
<div id="main-wrapper">
    <div class="nav-header">
        <a href="#" class="brand-logo">
            <img class="logo-abbr" src="/images/arm_.png" alt="">
           {{-- <img class="logo-compact" src="/images/logo.jpg" alt="">
            <img class="brand-title" src="/images/logo.jpg" alt="">--}}
        </a>
        <div class="nav-control">
            <div class="hamburger">
                <span class="line"></span><span class="line"></span>
                <span class="line"></span>
            </div>
        </div>
    </div>
    @include('partial._header-top')
     @include('partial._sidebar-menu')
    <div class="content-body">
        <div class="container-fluid">
            @yield('main-content')
        </div>
    </div>
   @include('partial._footer-note')
</div>
@include('partial._footer-scripts')
</body>

</html>
