<x-app-layout>
    <x-slot name="header">
        <div class="flex">
            <h2 class="text-xl text-gray-800 leading-tight grow">
                <a href="{{ url("/competitions/$competition[id]") }}" class="text-gray-500 hover:text-black">
                    {{ $competition["name"] }}
                </a>
                <i class="fas fa-angle-right text-sm mx-2"></i>
                Tournoi #{{ $id }} du {{ $start_date }}
            </h2>
            <a href="{{ url("/tournaments/$id/edit") }}" class="text-sm py-2 px-4 -my-2 rounded-md text-indigo-600 border hover:border-indigo-400">
                <i class="fas fa-edit mr-2 mt-1"></i> Modifier
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 md:grid gap-4 grid-cols-3">
            <div>
                @foreach ($pictures as $picture)
                    <img src="{{ $picture['secure_url'] }}">
                @endforeach
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Classement ici
                </div>
            </div>
            <div>
                @foreach ($games as $game)
                    <div>
                        {{ $game['player1']['name'] }}
                        {{ $game['player_1_score'] }}
                        -
                        {{ $game['player_2_score'] }}
                        {{ $game['player2']['name'] }}
                    </div>
                @endforeach
            </div>
        </div>
    </div>

</x-app-layout>
