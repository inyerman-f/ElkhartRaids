@extends('errors::illustrated-layout')

@section('code', '404')
@section('title', __('Team Rocket Blasts Off Again!!'))

@section('image')
    <div style="background-image: url('/img/images.jpg');" class="absolute pin bg-cover bg-no-repeat md:bg-left lg:bg-center">
    </div>
@endsection

@section('message', __('Sorry, the page you are looking for could not be found.'))
