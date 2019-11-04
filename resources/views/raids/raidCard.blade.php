{{--@if($end_time > $now)--}}
@php
    ini_set("allow_url_fopen", 1);
    $gymDetails = new \App\GymDetails();
    $body_image = $gymDetails->get_controlling_team_image($gymDetails->get_controlling_team());
    $gym = \App\Gym::find($raid->gym_id);
    $gymLat = $gym['latitude'];
    $gymLon = $gym['longitude'];
    if(isset($raid->hatch_time)){
    $hatch_time = $raid->hatch_time;
    $hatch_time = date('h:i:s A',strtotime($hatch_time)-( env('UTC_TIME_DIFFERENCE')*60*60) );
    }

    if ($raid->boss_name ==='TBD')
    {$mon_id=0;}
    else{
        $url = 'https://pokeapi.co/api/v2/pokemon/'.strtolower($raid->boss_name);
        $headers = get_headers($url, 1);
        if ($headers[0] == 'HTTP/1.1 200 OK') {

            $data = file_get_contents($url); // put the contents of the file into a variable
            $mon = json_decode($data, true); // decode JSON feed
            $mon_id = $mon['id'];

        }else{
            $mon_id = 0;
            $raid->boss_name = 'TBD';
        }

    }

      //$movesUrl = 'json/moves.json';
    //$movesData = file_get_contents($movesUrl);
    //$moves = json_decode($movesData, true);
    /**
    * @var
    * Invoke the GymDetails class to pass on methods and data
    */
    // $gymDetails = new \App\GymDetails();
    $raid->gym_name = $gymDetails->get_gym_name($raid->gym_id);
    $raid->gym_image = $gymDetails->get_gym_image($raid->gym_id);
    $raid->end_time = date('Y-m-d h:i:s A',strtotime($raid->end_time)-( env('UTC_TIME_DIFFERENCE')*60*60) );

    $now = date('Y-m-d h:i:s A', time()-(env('UTC_TIME_DIFFERENCE')*60*60));
    $raid->gym_location = $gymDetails->get_gym_location($raid->gym_id);

    /**
    * @if
    * check if the pokemon id value has been set. When a raid is active an integer value will be passed
    */

    if ($mon_id > 0){
        $raid->boss_image = 'https://pokeres.bastionbot.org/images/pokemon/'.$mon_id.'.png';
    }else{
        //this will be returned if the raid is not active yet.
        $mon_name = 'TBD';
            if ($raid->raid_tier === 5 ){
            $raid->boss_image = '/img/egg_legendary.png';
            }elseif($raid->rai_tier === 3 || $raid->raid_tier === 4){
            $raid->boss_image = '/img/egg_rare.png';
            }else{
            $raid->boss_image = '/img/egg_rare.png';
            }
        $move1 = 'TBD';
        $move2 = 'TBD';
        }
    /**
    * @var
    * this will be used to populate seo, and htmlHead data
    */
@endphp
<div class="card" style="border: thick solid blue; background-image:url({{$raid->gym_image}})">
    <div class="card-img-top" style="z-index: 1">
        <a href="/raids/{{$raid->gym_id}}"><img src="{{$raid->boss_image}}" class="small-image"></a>
    </div>
    <div class="card-body" style="color: black;z-index: 2; font-weight: bolder">
        <div class="card-text" style="z-index:2;">
            <h6 style="margin-top:10px;">{{$raid->gym_name}}</h6>
            Raid Level: {{$raid->raid_tier}}<br>
            Boss Name: {{$raid->boss_name}}<br>
            @if(isset($hatch_time))
            Starts:{{@date('h:i',$hatch_time)}} <br>
            @endif
            Ends: {{@date('h:i',strtotime($raid->end_time))}}   <br>
        </div>
        <input type="submit" value="View Raid Details" onclick="window.open('/raids/{{$raid->gym_id}}');" style="width:90%;"/>
    </div>
<!--input type="submit" value="Edit Quest Details" onclick="window.location='/raids/{{$raid->gym_id}}/edit';" /-->
<!--img class="gym-image" src="{{$raid->gym_image}}"-->
</div>
{{--@endif--}}


