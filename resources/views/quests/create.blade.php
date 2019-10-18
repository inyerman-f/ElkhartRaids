@extends('layout')

@section('title','Add New For Elkhart Pokemon Go Map')

@section('body_image', 'https://hdqwalls.com/download/1/valor-instinct-mystic-hd-ad-1920x1080.jpg')

@include('chunks.htmlHead')

@section('header')
    @include('chunks.navHeader')
@endsection


@section('content')
    <form method="post" action="/quests">
        {{csrf_field()}}
        <div>
        <label>Pokestop Id: </label>
        <input placeholder="Pokestop ID" name="pokestop_id" required value="{{$quest->pokestop_id}}" hidden>
        </div>
        <div>
            <label>Reward Item: </label>
            <input placeholder="Reward Item" name="reward_item" required>
        </div>
        <div>
            <label>Reward Type: </label>
            <input placeholder="Reward Type" name="reward_type" required>
        </div>
        <div>
            <label>Reward Amount: </label>
            <input placeholder="Reward" name="reward_amount">
        </div>
        <div>
            <label>Quest Type: </label>
            <input placeholder="Reward" name="quest_type" required>
        </div>
        <div>
            <label>Goal Amount: </label>
            <input placeholder="Goal" name="goal">
        </div>
        <div>
            <button type="submit">Add New Quest</button>
        </div>
    </form>
@endsection
