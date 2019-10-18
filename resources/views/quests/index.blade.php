@extends('layout')


{{--set HTML Head params--}}

@section('htmlHead')

@section('stylesheets')

@endsection
@section('title', env('CITY_NAME').' Pokemon Go Quests List')
@section('relativepath','quests')
@section('page-type','website')
@section('Description','Display a List of All Pokemon Go Quest Logged By the Community in '.env('CITY_NAME'))
@section('body_image', 'https://66.media.tumblr.com/95aae95fd77e067740ddf804478ea560/tumblr_pm3otecirv1y5a47mo1_1280.png')
@include('chunks.htmlHead')

@endsection


@section('header')
    @include('chunks.navHeader')
@endsection

@section('content')
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#all-quests" style="color:white" onclick="show_all_quests()">All Quests</a></li>
            <li><a data-toggle="tab" href="#quest-meowth-favorites" style="color:white" onclick="show_meowth_favorites()">Meowth's Favorites</a></li>
            <li><a data-toggle="tab" href="#quest-encounters" style="color:white" onclick="show_pokemon_encounters()">Pokemon Encounter</a></li>
            <li><a data-toggle="tab" href="#quest-items" style="color:white" onclick="show_item_quests()">Items Quests</a></li>
            <li><a data-toggle="tab" href="#quest-stardust" style="color:white" onclick="show_stardust_quests()">Stardust Quests</a></li>
            @include('chunks.social.joinusLi')
        </ul>
        {{--get all quests--}}
        <div class="tab-content" style="opacity: 0.95">

                <div id="all-quests" class="tab-pane fade in active show">
                    @php($quests = \App\Quest::whereRaw('DATE(now()) = DATE(recorded)')->get())
                    @each('quests.questCards',$quests,'quest')
                </div>
                <div id="quest-meowth-favorites" class="tab-pane fade">
                    @php($quests = \App\Quest::whereRaw('reward = "SPINDA" and DATE(now()) = DATE(recorded)')->get())
                    @each('quests.questCards',$quests,'quest')
                    @php($quests = \App\Quest::whereRaw('reward = "AERODACTYL" and DATE(now()) = DATE(recorded)')->get())
                    @each('quests.questCards',$quests,'quest')
                    @php($quests = \App\Quest::whereRaw('reward = "GROWLITHE" and DATE(now()) = DATE(now()) = DATE(recorded)')->get())
                    @each('quests.questCards',$quests,'quest')
                    @php($quests = \App\Quest::whereRaw('reward = "STARDUST" and DATE(now()) = DATE(recorded)')->get())
                    @each('quests.dustQuestCards',$quests,'quest')
                </div>
                <div id="quest-encounters" class="tab-pane fade">
                    @php($quests = \App\Quest::whereRaw('reward = "POKEMON_ENCOUNTER" and  DATE(now()) = DATE(recorded)')->get())
                    @each('quests.questCards',$quests,'quest')
                </div>
                <div id="quest-items" class="tab-pane fade">
                    @php($quests = \App\Quest::whereRaw('reward = "ITEM" and DATE(now()) = DATE(recorded)')->get())
                    @each('quests.questCards',$quests,'quest')
                </div>
                <div id="quest-stardust" class="tab-pane fade">
                    @php($quests = \App\Quest::whereRaw('reward = "STARDUST" and DATE(now()) = DATE(recorded)')->get())
                    @each('quests.dustQuestCards',$quests,'quest')
                </div>

        </div>
@endsection

@section('scripts')
{{--javascripts go here--}}
@endsection
