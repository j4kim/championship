<x-app-layout>
    <x-slot name="header">
        <div class="flex">
            <h2 class="text-xl text-gray-800 leading-tight grow">
                <a href="{{ url("/tournaments/$tournament[id]") }}" class="text-gray-500 hover:text-black">
                    Tournoi #{{ $tournament['id'] }} du {{ $tournament['start_date'] }}
                </a>
                <i class="fas fa-angle-right text-sm mx-2"></i>
                Match n°{{ $number }}
            </h2>
        </div>
    </x-slot>

    <div class="py-24">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form action="{{ url("/games/$id") }}" method="POST">
                @method('PUT')
                @csrf

                <div class="mb-8 md:px-60 flex text-center text-2xl">
                    <div class="w-1/2">
                        <h2 class="mb-4">{{ $player1['user']['name'] }}</h2>
                        <input class="text-3xl w-24" min="0" type="number" name="player_1_score" value="{{ $player_1_score }}">
                    </div>
                    <div class="w-1/2">
                        <h2 class="mb-4">{{ $player2['user']['name'] }}</h2>
                        <input class="text-3xl w-24" min="0" type="number" name="player_2_score" value="{{ $player_2_score }}">
                    </div>
                </div>

                <div class="mb-8">
                    <label class="inline-flex items-center">
                        <input type='hidden' name='played' value='0'>
                        <input type="checkbox" name="played" value="1" {{ $played ? 'checked' : '' }}>
                        <span class="ml-2">Match terminé</span>
                    </label>
                </div>

                <hr class="my-8">

                <a href="{{ url("/tournaments/$tournament[id]") }}" class="py-2 px-6 mr-2 font-semibold rounded-md bg-gray-300">
                    Annuler
                </a>
                <button class="py-2 px-6 font-semibold rounded-md bg-indigo-600 text-white">
                    Sauver
                </button>
            </form>
        </div>
    </div>

</x-app-layout>
