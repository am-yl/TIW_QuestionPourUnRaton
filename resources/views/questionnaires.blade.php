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
                    <a href="{{ route('questionnaires.new') }}">Créer un nouveau questionnaire</a>
                    <table>
                        <thead>
                            <tr>
                                <th class="p-2 mb-2 text-center">#</th>
                                <th class="p-2 mb-2">Intitulé du questionnaire</th>
                                <th class="p-2 mb-2">Description</th>
                                <th class="p-2 mb-2">Nombre de questions</th>
                                <th class="p-2 mb-2">Groupe(s) assigné(s)</th>
                                <th class="p-2 mb-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($questionnaires as $questionnaire)
                            <tr>
                                <td class="p-2 mb-2 text-center">{{ $questionnaire->id }}</td>
                                <td class="p-2 mb-2">{{ $questionnaire->name }}</td>
                                <td class="p-2 mb-2">{{ $questionnaire->description }}</td>
                                <td class="p-2 mb-2">{{ count($questionnaire->questions) }}</td>
                                <td class="p-2 mb-2">
                                    @foreach ($questionnaire->groupes as $q_groupe)
                                    {{ $q_groupe->name }} ;
                                    @endforeach
                                </td>
                                <td class="p-2 mb-2"><a href="{{ route('questionnaires.show',[$questionnaire->id,0]) }}">Voir</a> ; <a href="{{route('questionnaires.delete',$questionnaire->id)}}">Supprimer</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
