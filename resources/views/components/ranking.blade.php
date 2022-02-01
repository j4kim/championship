@props(['participants'])

<table class="w-full">
    <thead>
        <tr class="text-left text-xs">
            <th class="p-1 w-3/5">Player</th>
            <th class="p-1">MJ</th>
            <th class="p-1">V</th>
            <th class="p-1">P</th>
            <th class="p-1">C</th>
        </tr>
    </thead>
    <tbody class="border-t border-gray-200">
        @foreach ($participants as $participant)
            <tr class="border-b border-gray-200">
                <td class="p-1">
                    <span class="mr-1 text-xs font-bold">
                        {{ $participant['rank'] }}
                    </span>
                    {{ $participant['user']['name'] }}
                </td>
                <td class="p-1">{{ $participant['gamesPlayed'] }}</td>
                <td class="p-1">{{ $participant['wins'] }}</td>
                <td class="p-1">{{ $participant['points'] }}</td>
                <td class="p-1 font-bold">
                    {{ $participant['champPoints'] > 0 ? '+' : '' }}{{ $participant['champPoints'] }}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
