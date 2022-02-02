<x-app-layout>
    <x-slot name="header">
        <div class="flex">
            <h2 class="text-xl text-gray-800 leading-tight grow">
                Modification du tournoi #{{ $id }} du {{ $formattedDate }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form action="{{ url("/tournaments/$id") }}" method="POST">
                @method('PUT')
                @csrf

                <div class="mb-8" x-data="{ host_id: {{ $host_id }}}">
                    <span class="text-gray-700">Hôte</span>
                    <select class="block w-full md:w-1/3 mt-1" name="host_id" x-model="host_id">
                        @foreach ($participants as $participant)
                            <option value="{{ $participant['user']['id'] }}">
                                {{ $participant['user']['name'] }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-8">
                    <span class="text-gray-700">Date</span>
                    <input type="date" class="block w-full md:w-1/3 mt-1" name="date" value="{{ $date }}">
                </div>

                <div class="mb-8">
                    <span class="text-gray-700">Spot</span>
                    <input type="text" class="block w-full md:w-1/3 mt-1" name="spot" value="{{ $spot }}">
                </div>

                <div class="mb-8" x-data="{ menu: {{ Js::from($menu) }} }">
                    <span class="text-gray-700">Menu</span>
                    <textarea type="text" class="block w-full md:w-2/3 mt-1" name="menu" x-model="menu"></textarea>
                </div>

                <div class="mb-8" x-data="{ conditions: {{ Js::from($conditions) }} }">
                    <span class="text-gray-700">Conditions</span>
                    <textarea type="text" class="block w-full md:w-2/3 mt-1" name="conditions" x-model="conditions"></textarea>
                </div>

                <div class="mb-8" x-data="upload({{ Js::from($pictures) }})">
                    <div class="flex">
                        <template x-for="image in images">
                            <div class="mr-4 relative">
                                <button x-on:click="remove(image)" type="button" class="w-4 h-4 bg-white absolute flex justify-center items-center rounded-full -left-1 -top-1 text-indigo-600 hover:bg-red-600 hover:text-white">
                                    <i class="fas fa-times text-xs"></i>
                                </button>
                                <img x-bind:src="image.thumbnail_url" class="inline mb-3"/>
                            </div>
                        </template>
                    </div>
                    <button type="button" x-on:click="showWidget" class="py-2 px-6 font-semibold rounded-md border border-indigo-600 text-indigo-600">
                        <i class="fas fa-camera mr-2"></i> Ajouter photos
                    </button>
                    <input type="hidden" name="pictures" x-bind:value="JSON.stringify(images)">
                </div>

                <div>
                    <label class="inline-flex items-center">
                        <input type='hidden' name='finished' value='0'>
                        <input type="checkbox" name="finished" value="1" {{ $finished ? 'checked' : '' }}>
                        <span class="ml-2">Le tournoi est terminé</span>
                    </label>
                </div>

                <hr class="my-8">

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
