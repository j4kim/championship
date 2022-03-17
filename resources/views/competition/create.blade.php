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
            <form
                action="{{ isset($edit) ? @url("/competitions/$id") : url('/competitions') }}"
                method="POST"
            >
                @csrf

                <div class="mb-8" x-data="{ name: {{ @Js::from($name) }} }">
                    <span class="text-gray-700">Nom</span>
                    <input
                        type="text"
                        name="name" required
                        x-bind:value="name"
                        class="block w-full mt-1"
                    >
                </div>

                <div class="mb-8" x-data="{
                    users: {{ Js::from($users) }},
                    selectedEmail: '',
                    participants: {{ Js::from($edit ? $participants : [Auth::user()->email]) }}
                }">
                    <span class="text-gray-700">Participants</span>
                    <div class="flex items-baseline	">
                        <div class="flex-1">
                            <input
                                type="search"
                                x-model="selectedEmail"
                                list="all-users"
                                placeholder="Sélectionnez dans la liste ou entrez une adresse e-mail"
                                class="block w-full mt-1"
                            >
                            <datalist id="all-users" >
                                <template x-for="user in users">
                                    <template x-if="!participants.includes(user.email)">
                                        <option x-bind:value="user.email" x-text="user.name">
                                    </template>
                                </template>
                            </datalist>
                        </div>
                        <div>
                            <button
                                type="button"
                                class="ml-2 py-2 px-6 font-semibold rounded-md bg-indigo-600 text-white"
                                x-on:click="if (selectedEmail && !participants.includes(selectedEmail)) { participants.push(selectedEmail) } selectedEmail = ''"
                            >
                                Ajouter
                            </button>
                        </div>
                    </div>
                    <template x-for="email in participants">
                        <div>
                            <span x-text="email"></span>
                            <input x-bind:value="email" type="hidden" name="users[]">
                            <button type="button" x-on:click="participants = participants.filter(p => p !== email)">x</button>
                        </div>
                    </template>
                </div>

                <hr class="my-8">

                <a href="{{ url('/dashboard') }}" class="py-2 px-6 mr-2 font-semibold rounded-md bg-gray-300">
                    Annuler
                </a>
                <button class="py-2 px-6 font-semibold rounded-md bg-indigo-600 text-white">
                    {{ $edit ? 'Sauver' : 'Créer' }}
                </button>
            </form>
        </div>
    </div>

</x-app-layout>
