@extends('layout')

@php
$stop = \App\PokeStop::find($quest->pokestop_id);
@endphp

@section('fbSDK')
    @include('chunks.social.fbSDK')
@endsection

@section('htmlHead')
    @section('stylesheets')
    @endsection
    @section('title', env('CITY_NAME').'. A quest for pokestop '.$quest->pokeStop_name .' has been logged.')
    @section('relativepath','quests/'.$quest->pokestop_id)
    @section('page-type','website')
    @section('Description','Today\'s quest at '.$quest->pokeStop_name.' is rewarding '.$quest->reward)
    @section('image',$quest->pokestop_image)
    @include('chunks.htmlHead')
@endsection


@section('body_image', 'https://66.media.tumblr.com/95aae95fd77e067740ddf804478ea560/tumblr_pm3otecirv1y5a47mo1_1280.png')

@section('header')
    @include('chunks.navHeader')
@endsection

@section('content')
    <style>
        .div{
            width: 100%;
        }
    </style>
<section class="details-section">

    <style>
        /* Set the size of the div element that contains the map */
        #map {
            height: 230px;  /* The height is 400 pixels */
            width: 100%;  /* The width is the width of the web page */
        }
    </style>
    <div class="individual-item-card card w-100" >
        <div class="card-img-top">
            <a href="/quests/stop/{{$quest->pokestop_id}}/edit"><img class="small-image" src="{{$quest->pokestop_image}}"></a>
        </div>
        <div class="card-body">
            <div class="card-text">
            Pokestop Name: {{$quest->pokeStop_name}}<br>
            Location : <a href="http://google.com/maps/place/{{$quest->pokeStop_name}}">Get Driving Directions</a><br><br>
            Reward: {{$quest->reward}}<br>
            Task: {{$quest->quest_type}}<br>
            </div>
            <input type="submit" value="View All Quests" onclick="window.location='/quests/';" style="width: 90%;"/><br>
            {{--<input type="submit" value="Edit Quest Details" onclick="window.location='/quests/{{$quest->pokestop_id}}/edit';" style="width: 90%"/><br>--}}
            {{--<input type="submit" value="Edit Pokestop Details" onclick="window.location='/quests/stop/{{$quest->pokestop_id}}/edit';" style="width: 90%"/><br>--}}
            <div id="map">

            </div>
        </div>

    </div>
    <script>
        // Initialize and add the map
        function initMap() {
            // The location of Uluru
            var uluru = {lat: {{$stop['latitude']}}, lng: {{$stop['longitude']}} };
            // The map, centered at Uluru
            var map = new google.maps.Map(
                document.getElementById('map'), {zoom: 15, center: uluru});
            // The marker, positioned at Uluru
            var marker = new google.maps.Marker({position: uluru, map: map});
        }
    </script>

    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key={{env('GOOGLE_MAPS_KEY')}}&callback=initMap">
    </script>
</section>
@endsection
