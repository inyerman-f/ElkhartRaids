<style>
    .input{
        width: 100%;
    }
</style>

@php
    $stop = new \App\PokeStopDetails();
    $id = $pokestop->pokestop_id;
    $latitude = $stop->get_latitude($id);
    $longitude = $stop->get_longitude($id);
@endphp

<form method="post" action="/pokestopdetails/{{$pokestop->pokestop_id}}">
    {{method_field('PATCH')}}
    {{csrf_field()}}
    <div class="field">
        <label class="label" for="pokestop_id">Pokestop Id: </label>
        <div class="control">
            <input class="input" disabled placeholder="Pokestop Id" name="pokestop_id" value="{{$pokestop->pokestop_id}}">
        </div>
    </div>
    <div>
        <label class="label" for="latitude">Latitude: </label>
        <div class="control">
            <input type="text" class="input" placeholder="Latitude" name="latitude" disabled value="{{$latitude}}">
        </div>
    </div>
    <div class="field">
        <label class="label" for="longitude">Longitude: </label>
        <div class="control">
            <input placeholder="longitude" class="input" name="longitude" disabled value="{{$longitude}}">
        </div>
    </div>
    <div class="field">
        <label class="label" for="url">Pokestop Image Url: </label>
        <div class="control">
            <input class="input" placeholder="Pokestop Image Url" name="url" value="{{$pokestop->url}}">
        </div>
    </div>
    <div class="field">
        <label class="label" for="name">Pokestop Name: </label>
        <div class="control">
            <input class="input" placeholder="Pokestop Name" name="name" value="{{$pokestop->name}}">
        </div>
    </div>
    <div class="field">
        <button class="input" type="submit">Update pokestop</button>
    </div>
</form>
<input type="submit" class="input" value="Return to quest details." onclick="window.location='/quests/{{$pokestop->pokestop_id}}';"/>
<input type="submit" class="input" value="Go To Pokestop List" onclick="window.location='/pokestops';"/>

