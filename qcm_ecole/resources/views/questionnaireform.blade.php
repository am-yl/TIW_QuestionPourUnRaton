<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Questionnaires') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="{{ route('questionnaires.index') }}">&larr; Retour à la liste des questionnaires</a>
                    <p>Ajout des questions uniquement dans les questionnaires</p>
                    @if (isset($questionnaire))
                        <form action="{{ route('questionnaires.update', $questionnaire->id) }}" method="post">
                        @method('put')
                    @else
                        <form action="{{ route('questionnaires.store') }}" method="post">
                    @endif
                        @csrf
                        @if(isset($questionnaire))
                            <label for="name">Changer le nom du questionnaire : </label>
                            <input type="text" name="name" id="name" value="{{ $questionnaire->name }}">
                            <label for="description">Changer la description du questionnaire : </label>
                            <input type="text" name="description" id="description" value="{{ $questionnaire->description }}">
                        @else
                            <label for="name">Nom du questionnaire</label>
                            <input type="text" name="name" id="name" placeholder="Le potit nom">
                            <label for="description">Description du questionnaire</label>
                            <input type="text" name="description" id="description" placeholder="La description">
                        @endif
                        <button type="submit">Enregistrer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>