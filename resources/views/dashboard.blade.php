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
                    <ul class="border-t">
                        @foreach ($competitions as $competition)
                        <a href="{{ url('/competition/' . $competition->id) }}">
                            <li class="border-b py-2 hover:text-indigo-500">
                                {{ $competition->id }}
                                {{ $competition->name }}
                            </li>
                        </a>
                        @endforeach
                    </ul>
                </div>
            </div>
            <form class="py-10 text-center" action="{{ url('/competition') }}" method="post">
                @csrf
                <button class="py-2 px-6 font-semibold rounded-md bg-indigo-600 text-white">
                    <i class="fas fa-plus mr-2"></i> Nouvelle compétition
                </button>
            </form>
        </div>
    </div>

</x-app-layout>
