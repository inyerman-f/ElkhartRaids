@extends('layout')


{{--set HTML Head params--}}

@section('htmlHead')

    @section('stylesheets')

    @endsection
    @section('title', env('CITY_NAME').' Pokemon Go Quests List')
    @section('relativepath','quests/search/')
    @section('page-type','website')
    @section('Description','Display a List of All Pokemon Go Quest Logged By the Community in '.env('CITY_NAME'))
    @section('body_image', 'https://66.media.tumblr.com/95aae95fd77e067740ddf804478ea560/tumblr_pm3otecirv1y5a47mo1_1280.png')
    @include('chunks.htmlHead')

@endsection


@section('header')
    @include('chunks.navHeader')
@endsection

@section('content')
    {{--get all quests--}}
    <div class="quest-search-cards">
        <div id="quest-search" class="card-gallery">

            @if($quests = \App\Quest::whereRaw('reward_item = "'.str_replace(' ','_', strtoupper($search_param)).'" and DATE(now()) = DATE(DATE_ADD(last_scanned, INTERVAL '.env('UTC_TIME_DIFFERENCE').' HOUR))')->count()>0)
                @php($quests = \App\Quest::whereRaw('reward_item = "'.str_replace(' ','_', strtoupper($search_param)).'" and DATE(now()) = DATE(DATE_ADD(last_scanned, INTERVAL '.env('UTC_TIME_DIFFERENCE').' HOUR))')->get())
                @php($nothing=0)
                @each('quests.questCards',$quests,'quest')
            @else
                @php($nothing=1)
            @endif

            @if($quests = \App\Quest::whereRaw('reward_type = "'.str_replace(' ','_', strtoupper($search_param)).'" and DATE(now()) = DATE(DATE_ADD(last_scanned, INTERVAL '.env('UTC_TIME_DIFFERENCE').' HOUR))')->count()>0)
                @php($quests = \App\Quest::whereRaw('reward_type = "'.str_replace(' ','_', strtoupper($search_param)).'" and DATE(now()) = DATE(DATE_ADD(last_scanned, INTERVAL '.env('UTC_TIME_DIFFERENCE').' HOUR))')->get())
                @php($nothing = $nothing + 0)
                @each('quests.questCards',$quests,'quest')
            @else
                @php($nothing = $nothing + 1)
            @endif
        </div>
    </div>
    @if($nothing === 2)
    <h1 style="color:white;text-shadow: black 3px 3px 3px">There are currently no quests rewarding "{{$search_param}}" in town. Please try again later or search for a different reward.</h1>
    @endif
@endsection

@section('scripts')
    {{--javascripts go here--}}
@endsection
