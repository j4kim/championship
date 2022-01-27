<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl text-gray-800 leading-tight">
            Compétition: <span class="font-bold">{{ $name }}</span>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <ul class="border-t">
                        @foreach ($tournaments as $tournament)
                            <a href="{{ url("/competition/$id/tournaments/$tournament[id]") }}">
                                <li class="border-b py-2 hover:text-indigo-500">
                                    Tournoi des légendes #{{ $tournament['id'] }} du {{ $tournament['start_date'] }}
                                </li>
                            </a>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
