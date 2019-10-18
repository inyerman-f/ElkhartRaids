
<style>
    .input{
        width: 100%;
    }
</style>
<form method="post" action="/quests/{{$quest->pokestop_id}}">
    {{method_field('PATCH')}}
    {{csrf_field()}}
    <div class="field">
        <label class="label" for="reward_item">Reward Item: {{$quest->pokestop_id}}</label>
        <div class="control">
            <input type="text" class="input" placeholder="Reward Item" name="reward_item" value="{{$quest->reward_item}}">
        </div>
    </div>
    <div class="field">
        <label class="label" for="reward_type">Reward Type: </label>
        <div class="control">
            <input placeholder="Reward Type" class="input" name="reward_type" value="{{$quest->reward_type}}">
        </div>
    </div>
    <div class="field">
        <label class="label" for="reward_amount">Reward Amount: </label>
        <div class="control">
            <input class="input" placeholder="Reward" name="reward_amount" value="{{$quest->reward_amount}}">
        </div>
    </div>
    <div class="field">
        <label class="label" for="quest_type">Quest Type: </label>
        <div class="control">
            <input class="input" placeholder="Quest Type" name="quest_type" value="{{$quest->quest_type}}">
        </div>
    </div>
    <div class="field">
        <label class="label" for="goal">Goal Amount: </label>
        <div class="control">
            <input class="input" placeholder="Goal" name="goal" value="{{$quest->goal}}">
        </div>
    </div>
    <div>
        <button class="input" type="submit">Update Quest</button>
    </div>
</form>
