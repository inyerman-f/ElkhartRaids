@extends('layout')
@section('title','Edit Pokestop Details For Elkhart Pokemon Go Map')

@section('body_image', 'https://hdqwalls.com/download/1/valor-instinct-mystic-hd-ad-1920x1080.jpg')

@include('chunks.htmlHead')

@section('header')
    @include('chunks.navHeader')
@endsection

@section('content')
    @php
        $pokestop = \App\PokeStopDetails::where('pokestop_id',$pokestop->pokestop_id)->get();
    @endphp
    @each('quests.update_pokestop_form',$pokestop,'pokestop')
@endsection


