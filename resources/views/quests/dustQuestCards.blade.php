
@php
    //set pokestop details and clean output texts
    $stopDetails = new \App\PokeStopDetails();
    $quest->pokeStop_name = $stopDetails->get_pokestop_name($quest->pokestop_id);
    $quest->pokestop_image = $stopDetails->get_pokestop_image($quest->pokestop_id);
    $quest->quest_type = ucwords(strtolower(str_replace( "QUEST","", (str_replace("_"," ",$quest->quest_type)))));
    $quest->reward_type = ucwords(strtolower(str_replace( "ITEM","", (str_replace("_"," ",$quest->reward_type)))));
    $quest->reward_item = ucwords(strtolower(str_replace( "ITEM","", (str_replace("_"," ",$quest->reward_item)))));
@endphp
<div class="card">
    <div class="card-img-top" >
        <a href="/quests/{{$quest->pokestop_id}}"><img class="small-image" src="{{$quest->pokestop_image}}"></a>
    </div>
    <div class="card-body">
        <div class="card-text">
            <h6 style="margin-top:10px;">{{$quest->pokeStop_name}}</h6>
            Reward Item: {{$quest->reward_type}}<br>
            Reward Amount: {{$quest->reward_amount}}<br>
        </div>
        <input type="submit" value="Quest details" onclick="window.location='/quests/{{$quest->pokestop_id}}';" style="width: 90%;"/><br>
    </div>

</div>
