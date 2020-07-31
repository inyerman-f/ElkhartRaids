@extends('layout')
@section('fbSDK')
    @include('chunks.social.fbSDK')
@endsection


@php
    $gymDetails = new \App\GymDetails();
    $controlling_teamid = $gymDetails->get_controlling_team();
    //$body_image = $gymDetails->get_controlling_team_image($gymDetails->get_controlling_team());
    $controlling_team =$gymDetails->get_team_name($controlling_teamid);
    $gym_count = $gymDetails->get_controlling_team_count($controlling_teamid);
@endphp

{{--set HTML Head params--}}
@section('htmlHead')

    @section('stylesheets')
        <link rel="stylesheet" href="/css/home.css">
    @endsection
    @section('title', env('SITE_NAME') .'The site for all pokemon go raids happening in '.env('CITY_NAME').'.  Join our Discord https://discord.gg/G2AHwBd.
    Join Our Messenger Group https://m.me/join/AbZ4hk7JvPQRAnyL.')
    @section('relativepath','')
    @section('page-type','website')
    @section('Description','The site for all pokemon go raids happening in '.env('CITY_NAME').'.  Join our Discord https://discord.gg/G2AHwBd.
    Join Our Messenger Group https://m.me/join/AbZ4hk7JvPQRAnyL.' )
    {{--@section('image',$body_image)--}}
    @include('chunks.htmlHead')

@endsection
{{--End of HTML Head Params--}}
{{--@section('body_image', '/img/background-image.jpg')--}}
@section('header')
    @include('chunks.navHeader')
@endsection
@section('content')
    <section class="section">
        <div class="card w-100 individual-item-card" style="color:white;background-color:grey;opacity: .9">
            <h1>Come Raid With Us.</h1>
            <p class="intro-paragraph" >Please feel free to join us in our Raiding adventures. We are an active community of Pokemon GO trainers based in Elkhart, Indiana who enjoy doing raids on daily basis; while
                sharing a few laughs with the community.  We aim to keep a safe and fun environment for our fellow trainers. Anyone and everyone is welcome to join us regardless of background, or
                inclinations. We just ask to remain positive and respectful. Below are links to our messenger and discord groups. Both groups are linked through the use of bots
                so regardless of what platform you choose, you will always be able to reach all of your friends. Stay safe and catch 'em all!
            </p>
            <!-- Load Facebook SDK for JavaScript -->
        </div>
    </section>
@endsection
