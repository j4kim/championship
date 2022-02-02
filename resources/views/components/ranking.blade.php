@props(['participants'])

<table class="w-full">
    <thead>
        <tr class="text-left text-xs">
            <th></th>
            <th class="p-1 py-1.5 w-3/5">Joueur</th>
            <th class="p-1 py-1.5">MJ</th>
            <th class="p-1 py-1.5">V</th>
            <th class="p-1 py-1.5">P</th>
        </tr>
    </thead>
    <tbody class="border-t border-gray-200">
        @foreach ($participants as $participant)
            <tr class="border-b border-gray-200">
                <th class="text-xs">
                    <div class="text-white w-4 h-4 rounded-full {{
                        match ($participant['rank']) {
                            1 => 'bg-yellow-500',
                            2 => 'bg-slate-400',
                            3 => 'bg-amber-600',
                            default => 'text-current'
                        }
                    }}">{{ $participant['rank'] }}</div>
                </th>
                <td class="p-1 py-1.5">{{ $participant['user']['name'] }}</td>
                <td class="p-1 py-1.5">{{ $participant['gamesPlayed'] }}</td>
                <td class="p-1 py-1.5">{{ $participant['wins'] }}</td>
                <td class="p-1 py-1.5">{{ $participant['points'] }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
