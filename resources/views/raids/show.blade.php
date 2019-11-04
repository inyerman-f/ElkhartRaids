@extends('layout')
{{--Initiate php to run scrip to set var values --}}
@php
        ini_set("allow_url_fopen", 1);
        $gymDetails = new \App\GymDetails();
        $body_image = $gymDetails->get_controlling_team_image($gymDetails->get_controlling_team());
        $gym = \App\Gym::find($raid->gym_id);
        $gymLat = $gym['latitude'];
        $gymLon = $gym['longitude'];

        if ($raid->boss_name ==='TBD')
        {$mon_id=0;}
        else{
            $url = 'https://pokeapi.co/api/v2/pokemon/'.strtolower($raid->boss_name);
            $data = file_get_contents($url); // put the contents of the file into a variable
            $mon = json_decode($data, true); // decode JSON feed
            $mon_id = $mon['id'];
        }


        /**
        * @var
        * Invoke the GymDetails class to pass on methods and data
        */
        $gymDetails = new \App\GymDetails();
        $raid->gym_name = $gymDetails->get_gym_name($raid->gym_id);
        $raid->gym_image = $gymDetails->get_gym_image($raid->gym_id);
        $raid->hatch_time= date('Y-m-d h:i:s',strtotime($raid->hatch_time)-(env('UTC_TIME_DIFFERENCE')*60*60));
        $raid->end_time = date('Y-m-d h:i:s',strtotime($raid->end_time)-(env('UTC_TIME_DIFFERENCE')*60*60));

        $now = date('Y-m-d h:i:s', strtotime(time())-(env('UTC_TIME_DIFFERENCE')*60*60));
        $raid->gym_location = $gymDetails->get_gym_location($raid->gym_id);


        if ($mon_id > 0){
            $raid->boss_image = 'https://pokeres.bastionbot.org/images/pokemon/'.$mon_id.'.png';
        }else{
            //this will be returned if the raid is not active yet.
            $mon_name = 'TBD';
                if ($raid->raid_tier === 5 ){
                $raid->boss_image = '/img/egg_legendary.png';
                }elseif($raid->raid_tier === 3 || $raid->raid_tier === 4){
                $raid->boss_image = '/img/egg_rare.png';
                }else{
                $raid->boss_image = '/img/egg_normal.png';
                }
            $move1 = 'TBD';
            $move2 = 'TBD';
            }
        /**
        * @var
        * this will be used to populate seo, and htmlHead data
        */
        $title = 'Raid Details For Gym Id: '.$raid->gym_name.'. Boss:'.$raid->boss_name;

@endphp

{{--set HTML Head params--}}
@section('htmlHead')
    @section('stylesheets')
    @endsection
    @section('title','Raid at: '.$raid->gym_name)
    @section('relativepath','raids/'.$raid->gym_id)
    @section('page-type','website')
    @section('Description','This  Gym has a Raid for '.$raid->boss_name.' ending at '.$raid->end_time)
    @section('image',$raid->boss_image)
    @include('chunks.htmlHead')
@endsection

{{--@section('body_image', $body_image)--}}

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
                @if($now < $raid->end_time)
                <div class="card-img-top">
                    <a href="#"><img class="small-image" src="{{$raid->boss_image}}"></a>
                </div>
                <div class="card-body">
                <div class="card-text">
                 {{--Gym Id: {{$raid->gym_id}}<br>--}}
                    Gym Name: {{$raid->gym_name}}<br>
                    Location : <a href="https://google.com/maps/place/{{$raid->gym_location}}">Get Driving Directions</a><br>
                    Boss Name: {{$raid->boss_name}}<br>
                    Raid Level: {{$raid->raid_tier}}<br>
                    Raid Ends: {{@date('h:i', $raid->end_time)}}
                </div>
                @else
                    <div class="card-img-top">
                        <a href="#"><img class="small-image" src="https://gonintendo.com/system/file_uploads/uploads/000/052/819/medium/pikachu_sorprendido.jpg"></a>
                    </div>
                    <div class="card-body">
                    <div class="card-text">
                        <h1>The raid at this gym has expired. Please check back later, or explore other on going <a href="/raids">raids</a>.</h1>
                    </div>
                @endif
                <input class="button" type="submit" value="View All raids" onclick="window.location='/raids';" style="width: 90%;"/><br><br>
                <!--input type="submit" value="Edit raid Details" onclick="window.location='/raids/{{$raid->gym_id}}/edit';" style="width: 45%"/-->
                <div id="map"></div>
            </div>
        </div>
        <script>
            // Initialize and add the map
            function initMap() {
                // The location of Uluru
                var uluru = {lat: {{$gymLat}}, lng: {{$gymLon}} };
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
