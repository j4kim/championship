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

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 md:grid gap-4 grid-cols-3">
            ici le match
        </div>
    </div>

</x-app-layout>
