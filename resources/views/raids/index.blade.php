@extends('layout')
@php
    $gymDetails = new \App\GymDetails();
    $body_image = $gymDetails->get_controlling_team_image($gymDetails->get_controlling_team());
@endphp


{{--set HTML Head params--}}
@section('htmlHead')
@section('stylesheets')

@endsection
@section('title','A List Of All On Going Raids In '.env('CITY_NAME'))
@section('relativepath','raids')
@section('page-type','website')
@section('Description','All current raids for '.env('CITY_NAME').' are displayed here ')
@section('image',$body_image)
@include('chunks.htmlHead')
@endsection

@section('body_image', $body_image)

@section('header')
    @include('chunks.navHeader')
@endsection

@section('content')


    <ul class="nav nav-tabs" id="raids-nav-tabs">
        <li class="active"><a data-toggle="tab" href="#all-raids" style="color:white" onclick="show_all_raids()">All Raids</a></li>
    </ul>
    {{--get all raids--}}
    <div class="tab-content">
    @php
        $timeDiff = env('UTC_TIME_DIFFERENCE') ;
        $raidos = \App\Raid::whereRaw('now() < DATE_ADD(end_time, INTERVAL 0 HOUR) ORDER BY raid_tier DESC')->count();
    @endphp
    @if($raidos == 0)-
            <div id="all-raids" class="tab-pane fade in active show">
                <div class="individual-item-card card w-100" >
                    <div class="card-img-top">
                        <a href=""><img class="small-image" src="img/sadpika.png"></a>
                    </div>
                    <div class="card-body">
                        <div class="card-text">
                            <h1>Sorry, no raids are available at this time. Please check between 6:00 am and  8:00 pm, or look at our <a href="/quests/">quests</a> for the meantime.</h1>
                        </div>
                    </div>
                </div>
            </div>
            @else
            <div id="all-raids" class="tab-pane fade in active show">
                @php
                  //  $timeDiff = (env('UTC_TIME_DIFFERENCE') * -1);
                    $raids = \App\Raid::whereRaw('now() < DATE_ADD(end_time, INTERVAL 0 HOUR) ORDER BY raid_tier DESC')->get();
                @endphp
                @each('raids.raidCard',$raids,'raid')
            </div>
            @endif
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
    </script>
@endsection

