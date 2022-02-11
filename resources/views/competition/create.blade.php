<x-app-layout>
    <x-slot name="header">
        <div class="flex">
            <h2 class="text-xl text-gray-800 leading-tight grow">
                Création de la compétition
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form action="{{ url('/competitions') }}" method="POST">
                @csrf

                <div class="mb-8">
                    <span class="text-gray-700">Nom</span>
                    <input type="text" class="block w-full mt-1" name="name" required>
                </div>

                <hr class="my-8">

                <a href="{{ url('/dashboard') }}" class="py-2 px-6 mr-2 font-semibold rounded-md bg-gray-300">
                    Annuler
                </a>
                <button class="py-2 px-6 font-semibold rounded-md bg-indigo-600 text-white">
                    Créer
                </button>
            </form>
        </div>
    </div>

</x-app-layout>
