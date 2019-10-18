<!doctype html>
<html>
@yield('htmlHead')
<body style="">
<!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
<script>
    window.fbAsyncInit = function() {
        FB.init({
            xfbml            : true,
            version          : 'v3.3'
        });
    };

    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

<!-- Your customer chat code -->
<div class="fb-customerchat"
     attribution=setup_tool
     page_id="304569173533625"
     theme_color="#d4a88c"
     logged_in_greeting="Hi, would you like to help us reporting a raid?"
     logged_out_greeting="Hi, would you like to help us reporting a raid?"
>
</div>
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
