<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ajouter un groupe') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="{{ route('groupes.index') }}">&larr; Retour à la liste des groupes</a>
                    <form action="{{ route('groupes.store') }}" method="post">
                    @csrf
                        <label for="name">Nom du groupe</label>
                        <input type="text" id="name" name="name">
                        <label for="description">Description du groupe</label>
                        <input type="text" id="description" name="description">
                        <button type="submit">Ajouter le groupe</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>