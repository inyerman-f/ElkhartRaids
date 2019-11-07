@extends('layout')
@section('title','All gyms')

@php

    $gymDetails = new \App\GymDetails();
    $body_image = $gymDetails->get_controlling_team_image($gymDetails->get_controlling_team());

@endphp
{{--
@section('fbLogin')
    @include('chunks.social.fbLogin')
@endsection
--}}

@section('body_image', $body_image)

@section('fbSDK')
    @include('chunks.social.fbSDK')
@endsection

@include('chunks.htmlHead')

@section('header')
    @include('chunks.navHeader')
@endsection

@section('content')
    <div class="card-gallery">
        @foreach($gyms as $gym)
            @php
                //set gym details and clean output texts
                $gymDetails = new \App\GymDetails();
                $gym->gym_name = $gymDetails->get_gym_name($gym->gym_id);
                $gym->gym_image = $gymDetails->get_gym_image($gym->gym_id);
                $gym->gym_image = str_replace('http:','https:',$gym->gym_image);
                $gym->gym_team = $gymDetails->get_gym_team($gym->gym_id);
                $gym->gym_location = $gymDetails->get_gym_location($gym->gym_id);
                $gym_color = $gymDetails->get_gym_color($gym->gym_id);
                $team_image = $gymDetails->get_team_image($gym->gym_id);
                $gym_location = $gymDetails->get_gym_location($gym->gym_id);

            @endphp
            <div class="card" style="border: thick solid {{$gym_color}}">
                <div class="card-img-top" style="z-index: 2;">
                  <img class="small-image" src="{{$gym->gym_image}}">
                </div>
                <div class="card-body" style="z-index: 2;">
                    <div class="card-text">
                        <h6 style="margin-top:10px;">{{$gym->gym_name}}</h6>
                        Gym Location: {{$gym->gym_location}}<br>
                        Gym Possession: {{$gym->gym_team}}<br>
                        Spots Open: {{$gym->slots_available}}<br>
                        Location : <a href="http://google.com/maps/place/{{$gym->gym_location}}">{{$gym->gym_location}}</a><br>
                    </div>
                </div>
                <img class="gym-image"  src="{{$team_image}}">
            </div>
        @endforeach

    </div>

@endsection
