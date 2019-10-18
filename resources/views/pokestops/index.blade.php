@extends('layout')
@section('title','Display a List of All Pokemon Go Pokestop in Elkhart, Indiana')

@section('body_image', 'http://hdqwalls.com/download/1/valor-instinct-mystic-hd-ad-1920x1080.jpg')

@include('chunks.htmlHead')

@section('header')
    @include('chunks.navHeader')
@endsection
@section('content')
    <div class="card-gallery">
        @foreach($pokestops as $pokestop)
            @php
                //set pokestop details and clean output texts

                $stopDetails = new \App\PokeStopDetails();
                $pokestop->pokeStop_name = $stopDetails->get_pokestop_name($pokestop->pokestop_id);
                $pokestop->pokestop_image = $stopDetails->get_pokestop_image($pokestop->pokestop_id);
                $quest = new \App\Quest();
                $questExists = $quest->search_if_quest_exists($pokestop->pokestop_id);
                if ($questExists == 1){
                    $backgroundColor = 'green';
                }else{
                    $backgroundColor = 'red';
                }
                //$pokestop->pokestop_type = ucwords(strtolower(str_replace( "pokestop","", (str_replace("_"," ",$pokestop->pokestop_type)))));
                //$pokestop->reward_type = ucwords(strtolower(str_replace( "ITEM","", (str_replace("_"," ",$pokestop->reward_type)))));
                //$pokestop->reward_item = ucwords(strtolower(str_replace( "ITEM","", (str_replace("_"," ",$pokestop->reward_item)))));
            @endphp
            <div class="card" style="background-color:{{$backgroundColor}}">
                <div class="card-img-top">
                    <a href="/pokestops/{{$pokestop->pokestop_id}}"><img class="small-image" src="{{$pokestop->pokestop_image}}"></a>
                </div>
                <div class="card-body">
                    <div class="card-text">
                        <h6 style="margin-top:10px;">{{$pokestop->pokeStop_name}}</h6>
                    </div>
                    @if($questExists==0)
                    <input type="submit"  value="Add Quest" onclick="window.location='/quests/stop/{{$pokestop->pokestop_id}}/create';" style="width: 90%;" />
                    @endif
                    <input type="submit" value="Edit Stop details" onclick="window.location='/quests/stop/{{$pokestop->pokestop_id}}/edit';" style="width: 90%;"/>
                </div>

            </div>
        @endforeach

    </div>
@endsection
