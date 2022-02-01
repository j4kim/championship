<x-app-layout>
    <x-slot name="header">
        <div class="flex">
            <h2 class="text-xl text-gray-800 leading-tight grow">
                Création du tournoi
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form action="{{ url("/competitions/$competition->id/tournament") }}" method="POST">
                @csrf

                <div class="mb-8">
                    <span class="text-gray-700">Hôte</span>
                    <select class="block w-full md:w-1/3 mt-1" name="host_id">
                        <option value=""></option>
                        @foreach ($users as $user)
                            <option value="{{ $user['id'] }}">
                                {{ $user['name'] }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <hr class="my-8">

                <a href="{{ url("/competitions/$competition->id") }}" class="py-2 px-6 mr-2 font-semibold rounded-md bg-gray-300">
                    Annuler
                </a>
                <button class="py-2 px-6 font-semibold rounded-md bg-indigo-600 text-white">
                    Créer
                </button>
            </form>
        </div>
    </div>

</x-app-layout>
