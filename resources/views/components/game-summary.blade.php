@props(['game'])

<a href="{{ url("/games/$game[id]") }}" class="flex mb-4 p-4 bg-white shadow-sm rounded-lg hover:shadow-md">
    <div class="w-2/5 {{ $game['played'] && $game['player_1_wins'] ? 'font-bold text-indigo-600' : '' }}">
        {{ $game['player1']['user']['name'] }}
        @if ($game['player_1_score'] === 0 && $game['player_2_score'] >= 11)
            <x-kebab/>
        @endif
    </div>
    <div class="w-1/5 flex">
        <div class="w-1/3 text-right {{ $game['played'] && $game['player_1_wins'] ? 'font-bold text-indigo-600' : '' }}">
            {{ $game['player_1_score'] }}
        </div>
        <div class="w-1/3 text-center">
            -
        </div>
        <div class="w-1/3 {{ $game['played'] && $game['player_2_wins'] ? 'font-bold text-indigo-600' : '' }}">
            {{ $game['player_2_score'] }}
        </div>
    </div>
    <div class="w-2/5 text-right {{ $game['played'] && $game['player_2_wins'] ? 'font-bold text-indigo-600' : '' }}">
        @if ($game['player_2_score'] === 0 && $game['player_1_score'] >= 11)
            <x-kebab/>
        @endif
        {{ $game['player2']['user']['name'] }}
    </div>
</a>
