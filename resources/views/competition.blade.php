@section('title', $name)

<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center">
            <h2 class="text-xl text-gray-800 leading-tight grow">
                {{ $name }}
            </h2>
            <a href="{{ url("/competitions/$id/edit") }}" class="text-sm py-2 px-4 -my-2 rounded-md text-indigo-600 border hover:border-indigo-400">
                <i class="fas fa-edit md:mr-2 mt-1"></i>
                <span class="hidden md:inline">Modifier</span>
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 grid grid-cols-5 gap-12 items-start">
            <div class="bg-white shadow-sm sm:rounded-lg col-span-5 md:col-span-3">
                <div class="p-4">
                    <div class="mb-4 text-xs text-gray-600">
                        Liste des rencontres
                    </div>
                    <ul class="border-t border-gray-200">
                        @foreach ($tournaments as $tournament)
                            <a href="{{ url("/tournaments/$tournament[id]") }}">
                                <li class="border-b py-2 hover:text-indigo-500">
                                    Tournoi #{{ $tournament['id'] }} du {{ $tournament['formattedDate'] }}
                                </li>
                            </a>
                        @endforeach
                    </ul>
                    <div class="pt-4 text-center">
                        <a
                            href="{{ url("/competitions/$id/tournament/create") }}"
                            class="block py-2 px-6 font-semibold rounded-md border hover:border-indigo-600 text-indigo-600"
                        >
                            <i class="fas fa-plus mr-2"></i> Nouveau tournoi
                        </a>
                    </div>
                </div>
            </div>

            <div class="bg-gray-200 sm:rounded-lg p-4 col-span-5 md:col-span-2">
                <div class="text-xs mb-4">
                    Classement général
                </div>
                <table class="w-full">
                    <thead>
                        <tr class="text-left text-xs">
                            <th class="w-6"></th>
                            <th class="p-1 py-1.5">Joueur</th>
                            <th class="p-1 py-1.5">Points</th>
                        </tr>
                    </thead>
                    <tbody class="border-t border-gray-300">
                        @foreach ($standings as $result)
                            <tr class="border-b border-gray-300">
                                <th class="text-xs">
                                    <div class="text-white w-4 h-4 rounded-full {{
                                        match ($result['rank']) {
                                            1 => 'bg-yellow-500',
                                            2 => 'bg-slate-400',
                                            3 => 'bg-amber-600',
                                            default => 'text-current'
                                        }
                                    }}">{{ $result['rank'] }}</div>
                                </th>
                                <td class="p-1 py-1.5">{{ $result['user']['name'] }}</td>
                                <td class="p-1 py-1.5">{{ $result['points'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>

</x-app-layout>
