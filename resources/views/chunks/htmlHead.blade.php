<head>
@include('chunks.seo.googleTag')
<link rel="shortcut icon" href="https://cdn3.iconfinder.com/data/icons/pokemon-go-3/512/pokemon_go_play_game_cinema_film_movie-512.png" type="image/x-icon">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">
<title> @yield('title') </title>
<meta name="msvalidate.01" content="119A844D5D7F46FD287A1DC5E5AD64F9" />
@yield('stylesheets')
<link rel="stylesheet" href="/css/app.css">
<link rel="stylesheet" href="/css/layout.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
@include('chunks.seo.seoTags')
    <script>
        window.fbAsyncInit = function() {
            FB.init({
                appId      : '313874449202969',
                cookie     : true,
                xfbml      : true,
                version    : '3.2'
            });

            FB.AppEvents.logPageView();

        };

        (function(d, s, id){
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) {return;}
            js = d.createElement(s); js.id = id;
            js.src = "https://connect.facebook.net/en_US/sdk.js";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
</head>
