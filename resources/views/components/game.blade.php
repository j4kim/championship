@props(['game'])

<div class="flex mb-4 p-4 bg-white shadow-sm rounded-lg hover:shadow-md">
    <div class="w-2/5 {{ $game['player_1_wins'] ? 'font-bold text-indigo-600' : '' }}">
        {{ $game['player1']['name'] }}
    </div>
    <div class="w-1/5 flex">
        <div class="w-1/3 text-right {{ $game['player_1_wins'] ? 'font-bold text-indigo-600' : '' }}">
            {{ $game['player_1_score'] }}
        </div>
        <div class="w-1/3 text-center">
            -
        </div>
        <div class="w-1/3 {{ $game['player_2_wins'] ? 'font-bold text-indigo-600' : '' }}">
            {{ $game['player_2_score'] }}
        </div>
    </div>
    <div class="w-2/5 text-right {{ $game['player_2_wins'] ? 'font-bold text-indigo-600' : '' }}">
        {{ $game['player2']['name'] }}
    </div>
</div>
