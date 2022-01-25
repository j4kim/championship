<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>
            </div>
            <form class="py-10" action="{{ url('/competition') }}" method="post">
                @csrf
                <button class="h-10 px-6 font-semibold rounded-md bg-indigo-600  text-white">
                    Nouvelle compétition
                </button>
            </form>
        </div>
    </div>

</x-app-layout>
