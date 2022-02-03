@section('title',"Tournoi #$id")

<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center">
            <h2 class="text-xl text-gray-800 leading-tight grow">
                <a href="{{ url("/competitions/$competition[id]") }}" class="text-gray-500 hover:text-black">
                    {{ $competition["name"] }}
                </a>
                <i class="fas fa-angle-right text-sm mx-2"></i>
                Tournoi #{{ $id }} du {{ $formattedDate }}
            </h2>
            <a href="{{ url("/tournaments/$id/edit") }}" class="text-sm py-2 px-4 -my-2 rounded-md text-indigo-600 border hover:border-indigo-400">
                <i class="fas fa-edit md:mr-2 mt-1"></i>
                <span class="hidden md:inline">Modifier</span>
            </a>
        </div>
    </x-slot>

    <div class="p-4 sm:p-6 md:p-12">
        <div class="max-w-7xl mx-auto lg:px-8 md:grid gap-4 lg:gap-12 grid-cols-3 items-start">
            <div class="mb-4 md:mb-0 row-span-2">
                <div class="grid gap-4 grid-cols-3 mb-4">
                    @foreach ($pictures as $picture)
                    <a href="{{ $picture['secure_url'] }}" class="{{ $loop->first ? 'col-span-3' : 'col-span-1' }}">
                        <img src="{{ $picture['secure_url'] }}" class="rounded-lg w-full max-h-[40vh] object-cover {{ !$loop->first ? 'aspect-square' : '' }}">
                    </a>
                    @endforeach
                </div>
                <x-attribute label="Hôte" :value="$host['name']"/>
                <x-attribute label="Spot" :value="$spot"/>
                <x-attribute label="Menu" :value="$menu"/>
                <x-attribute label="Conditions" :value="$conditions"/>
            </div>
            <div class="mb-4 md:mb-0 bg-white shadow-sm rounded-lg col-span-2">
                <h4 class="p-4 md:p-6 text-xs text-gray-600 border-b border-gray-200">
                    Classement
                </h4>
                <div class="p-4 md:p-6">
                    <x-ranking :participants="$ranking"/>
                </div>
            </div>
            <div class="col-span-2 mb-4 md:mb-0">
                <div class="text-xs text-gray-600 mb-2">
                    Liste des matches
                </div>
                @foreach ($games as $game)
                    <x-game-summary :game="$game"/>
                @endforeach
                @if (!$finished)
                    <div class="text-xs text-gray-600 mb-2">
                        Nouveau match
                    </div>
                    <x-new-game-form :tournament-id="$id" :participants="$participants"/>
                @endif
            </div>
        </div>
    </div>

</x-app-layout>
