<x-app-layout>
    <x-slot name="header">
        <div class="flex">
            <h2 class="text-xl text-gray-800 leading-tight grow">
                <a href="{{ url("/tournaments/$tournament[id]") }}" class="text-gray-500 hover:text-black">
                    Tournoi #{{ $tournament['id'] }} du {{ $tournament['date'] }}
                </a>
                <i class="fas fa-angle-right text-sm mx-2"></i>
                Match {{ $player1['user']['name'] }} / {{ $player2['user']['name'] }}
            </h2>
        </div>
    </x-slot>

    <div class="py-24">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form
                action="{{ url("/games/$id") }}"
                method="POST"
                x-data="{
                    score1: {{ $player_1_score }},
                    score2: {{ $player_2_score }},
                    played: {{ Js::from($played) }}
                }"
                x-effect="if (Math.max(score1, score2) > 10 && Math.abs(score1 - score2) > 1) { played = true }"
            >
                @method('PUT')
                @csrf

                <div class="mb-12 md:px-60 flex text-2xl">
                    <div class="w-1/2 flex flex-col items-center">
                        <h2 class="font-bold">{{ $player1['user']['name'] }}</h2>
                        <input class="my-4 text-3xl w-24" min="0" type="number" name="player_1_score" x-model="score1">
                        <button type="button" x-on:click="score1++" class="bg-indigo-600 rounded-full w-16 h-16 text-white touch-manipulation">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                    <div class="w-1/2 flex flex-col items-center">
                        <h2 class="font-bold">{{ $player2['user']['name'] }}</h2>
                        <input class="my-4 text-3xl w-24" min="0" type="number" name="player_2_score" x-model="score2">
                        <button type="button" x-on:click="score2++" class="bg-indigo-600 rounded-full w-16 h-16 text-white touch-manipulation">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                </div>

                <div class="mb-8">
                    <label class="inline-flex items-center">
                        <input type="checkbox" name="played" x-model="played" value="1">
                        <span class="ml-2">Match terminé</span>
                    </label>
                </div>

                <hr class="my-8">

                <div class="flex items-center">
                    <a href="{{ url("/tournaments/$tournament[id]") }}" class="py-2 px-6 mr-2 font-semibold rounded-md bg-gray-300">
                        Annuler
                    </a>
                    <button class="py-2 px-6 mr-2 font-semibold rounded-md bg-indigo-600 text-white">
                        Sauver
                    </button>
                    <div class="grow"></div>
                    <form action="" method="post"></form>
                    <button name="delete" value="please" class="text-sm py-2 px-4 -my-2 rounded-md text-red-600 border hover:border-red-400">
                        <i class="fas fa-trash md:mr-2 mt-1"></i>
                        <span class="hidden md:inline">Supprimer</span>
                    </button>
                </div>
            </form>
        </div>
    </div>

</x-app-layout>
