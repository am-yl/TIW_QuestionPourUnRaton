<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Questionnaire') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="{{ route('questionnaires.index') }}">&larr; Retour à la liste des questionnaires</a>
                    <p class="p-2 mb-2 text-center">{{ $questionnaire->id }} ; {{ $questionnaire->name }} ; {{ $questionnaire->description }}</p>
                    <a href="{{ route('questionnaires.edit', $questionnaire->id)}}">Modifier</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
