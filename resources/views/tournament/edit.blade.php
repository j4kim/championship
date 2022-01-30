<x-app-layout>
    <x-slot name="header">
        <div class="flex">
            <h2 class="text-xl text-gray-800 leading-tight grow">
                Modification du tournoi #{{ $id }} du {{ $start_date }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form action="{{ url("/tournaments/$id") }}" method="POST">
                @method('PUT')
                @csrf
                <div x-data="upload({{ Illuminate\Support\Js::from($pictures) }})">
                    <template x-for="image in images">
                        <img x-bind:src="image.thumbnail_url" class="inline ml-2 mb-2">
                    </template>
                    <div>
                        <button type="button" x-on:click="showWidget" class="py-2 px-6 font-semibold rounded-md border border-indigo-600 text-indigo-600">
                            <i class="fas fa-camera mr-2"></i> Ajouter photo
                        </button>
                    </div>
                    <input type="hidden" name="pictures" x-bind:value="JSON.stringify(images)">
                </div>
                <hr class="my-4">
                <a href="{{ url("/tournaments/$id") }}" class="py-2 px-6 mr-2 font-semibold rounded-md bg-gray-300">
                    Annuler
                </a>
                <button class="py-2 px-6 font-semibold rounded-md bg-indigo-600 text-white">
                    Sauver
                </button>
            </form>
        </div>
    </div>

</x-app-layout>
