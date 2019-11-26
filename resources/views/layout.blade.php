<!doctype html>
<html>
@yield('htmlHead')
<body style="">
@yield('fbSDK')
<header>
@yield('header')
</header>
    <div class="container">
        <section id="mainContent">
            @yield('content')
        </section>
    </div>
</body>
@yield('scripts')
@include('chunks.htmlElements.globalscripts')
</html>
