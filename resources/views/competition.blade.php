<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl text-gray-800 leading-tight">
            {{ $name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4">
                    <div class="mb-4 text-xs text-gray-600">
                        Liste des rencontres
                    </div>
                    <ul class="border-t border-gray-200">
                        @foreach ($tournaments as $tournament)
                            <a href="{{ url("/tournaments/$tournament[id]") }}">
                                <li class="border-b py-2 hover:text-indigo-500">
                                    Tournoi #{{ $tournament['id'] }} du {{ $tournament['date'] }}
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
            <div class="text-xs text-gray-600 mt-6">
                Classement
            </div>
        </div>
    </div>

</x-app-layout>
