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

                <div class="mb-12 md:px-60 flex text-2xl" x-data="{
                    score1: {{ $player_1_score }},
                    score2: {{ $player_2_score }}
                }">
                    <div class="w-1/2 flex flex-col items-center">
                        <h2>{{ $player1['user']['name'] }}</h2>
                        <input class="my-4 text-3xl w-24" min="0" type="number" name="player_1_score" x-model="score1">
                        <button type="button" x-on:click="score1++" class="bg-indigo-600 rounded-full w-16 h-16 text-white">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                    <div class="w-1/2 flex flex-col items-center">
                        <h2>{{ $player2['user']['name'] }}</h2>
                        <input class="my-4 text-3xl w-24" min="0" type="number" name="player_2_score" x-model="score2">
                        <button type="button" x-on:click="score2++" class="bg-indigo-600 rounded-full w-16 h-16 text-white">
                            <i class="fas fa-plus"></i>
                        </button>
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
