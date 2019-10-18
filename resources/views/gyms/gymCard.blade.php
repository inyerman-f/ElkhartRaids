@php
    $url = 'json/pokemon.json';
    $data = file_get_contents($url); // put the contents of the file into a variable
    $mons = json_decode($data, true); // decode the JSON feed
   // $end_time =  new DateTime(strtotime($raid->end));
   // $now = new DateTime(strtotime(time()));
    $gymDetails = new \App\GymDetails();
   // $raid->gym_id = $gymDetails->get_gym_id($raid->gym_id);
    $raid->gym_name = $gymDetails->get_gym_name($raid->gym_id);
    $raid->gym_image = $gymDetails->get_gym_image($raid->gym_id);
    $raid->controlling_team = $gymDetails->get_gym_team($raid->gym_id);
    $raid->end = date('h:i A',strtotime($raid->end)+(env('UTC_TIME_DIFFERENCE')*60*60));
    $raid->start = date('h:i A',strtotime($raid->start)+(env('UTC_TIME_DIFFERENCE')*60*60));
    $gym_color = $gymDetails->get_gym_color($raid->gym_id);
    if ($raid->pokemon_id > 0){
        $mon_name = $mons[$raid->pokemon_id]['name'];
        $raid->boss_image = '/img/mons/'.$raid->pokemon_id.'.png';
    }else{
        $mon_name = 'To Be Determined.';
            if ($raid->level < 3 ){
            $raid->boss_image = '/img/egg_normal.png';
            }elseif($raid->level < 5){
            $raid->boss_image = '/img/egg_rare.png';
            }else{
            $raid->boss_image = '/img/egg_legendary.png';
            }
        }
@endphp
{{--@if($end_time > $now)--}}
<div class="card" style="border: thick solid {{$gym_color}}; background-image:url({{$raid->gym_image}})">
    <div class="card-img-top" style="z-index: 1">
        <a href="/raids/{{$raid->gym_id}}"><img src="{{$raid->boss_image}}" class="small-image"></a>
    </div>
    <div class="card-body" style="color: black;z-index: 2; font-weight: bolder">
        <div class="card-text" style="z-index:2;">
            <h6 style="margin-top:10px;">{{$raid->gym_name}}</h6>
            Raid Level: {{$raid->level}} | team: {{$raid->controlling_team}}<br>
            Boss Name: {{$mon_name}}<br>
            Starts: {{$raid->start}} | Ends: {{$raid->end}}<br>
        </div>
        <input type="submit" value="View Raid Details" onclick="window.open('/raids/{{$raid->gym_id}}');" style="width:90%;"/>
    </div>
<!--input type="submit" value="Edit Quest Details" onclick="window.location='/raids/{{$raid->gym_id}}/edit';" /-->
<!--img class="gym-image" src="{{$raid->gym_image}}"-->
</div>
{{--@endif--}}
