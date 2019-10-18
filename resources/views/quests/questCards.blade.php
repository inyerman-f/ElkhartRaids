
@php
    //set pokestop details and clean output texts
    $stopDetails = new \App\PokeStopDetails();
    $quest->pokestop_id = $stopDetails->get_pokestop_id_by_alias($quest->pokestop_name);
    $quest->pokestop_image = $stopDetails->get_pokestop_image($quest->pokestop_id);
@endphp
<div class="card">
    <div class="card-img-top" >
        <a href="/quests/{{$quest->pokestop_id}}"><img class="small-image" src="{{$quest->pokestop_image}}"></a>
    </div>
    <div class="card-body">
        <div class="card-text">
            <h6 style="margin-top:10px;">This stop is rewarding: {{$quest->reward}}.</h6>
            Location: {{$quest->pokestop_name}}<br>
            Reward Item: {{$quest->task}}<br>
        </div>
        {{--<input type="submit" value="Quest details" onclick="window.location='/quests/{{$quest->pokestop_id}}';" style="width: 90%;"/><br>--}}
    </div>

</div>
