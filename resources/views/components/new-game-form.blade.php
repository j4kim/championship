@props(['tournamentId', 'participants'])


<form
    class="flex -m-1"
    action="{{ url("/tournaments/$tournamentId/game") }}"
    method="POST"
    x-data="{
        players: {{ Js::from($participants) }},
        player_1_id: 0,
        player_2_id: 0
    }"
    x-effect="if (player_1_id && player_2_id) { $root.submit() }"
>
    @csrf
    <select class="block w-1/2 m-1" name="player_1_id" x-model="player_1_id">
        <option value=""></option>
        <template x-for="player in players">
            <option
                x-bind:value="player.id"
                x-bind:disabled="player.id == player_2_id"
                x-text="player.user.name"
            ></option>
        </template>
    </select>
    <select class="block w-1/2 m-1" name="player_2_id" x-model="player_2_id">
        <option value=""></option>
        <template x-for="player in players">
            <option
                x-bind:value="player.id"
                x-bind:disabled="player.id == player_1_id"
                x-text="player.user.name"
            ></option>
        </template>
    </select>
</form>
