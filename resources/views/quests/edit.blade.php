@extends('layout')

@section('title','Edit Pokemon Quest For Elkhart Pokemon Go Map')

@section('body_image', 'https://hdqwalls.com/download/1/valor-instinct-mystic-hd-ad-1920x1080.jpg')

@include('chunks.htmlHead')

@section('header')
    @include('chunks.navHeader')
@endsection

@section('content')
    @php
    $quest = \App\Quest::where('pokestop_id',$quest->pokestop_id)->get();
    @endphp
    @each('quests.update_quest_form',$quest,'quest')
@endsection


