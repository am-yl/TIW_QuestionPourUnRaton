<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        @if(Auth::user()->role_id == 2)
            {{ __('Mes questionnaires') }}
        @else
            {{ __('Gérer les questionnaires')}}
        @endif
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Prof ou Admin -->
                    @if(Auth::user()->role_id == 3 || Auth::user()->role_id == 4)
                        <a href="{{ route('questionnaires.new') }}">Créer un nouveau questionnaire</a>
                        @if($questionnaires != false)
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
                                @if(count($questionnaires) > 0)
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
                                @endif
                            </tbody>
                        </table>
                        @else
                        <p>Vous n'avez pas de questionnaires</p>
                        @endif
                    <!-- Eleve -->
                    @elseif(Auth::user()->role_id == 2)
                        @if($questionnaires != false)
                            @if(count($questionnaires) > 0)
                            @foreach ($questionnaires as $questionnaire)
                                <div>
                                    <h4>{{ $questionnaire->name }}</h4>
                                    <p>{{ $questionnaire->description}}<br/>{{count($questionnaire->questions)}} questions</p>
                                    <p>Note :
                                        @if (isset(Auth::user()->questionnaires->where('id', '=', $questionnaire->id)->resultat))
                                        {{ Auth::user()->questionnaires->where('id', '=', $questionnaire->id)->resultat }} / {{ count($questionnaire->questions) }}
                                        @else
                                        Non Applicable
                                        @endif
                                    </p>
                                    <a href="{{ route('questionnaires.show', $questionnaire->id) }}">Répondre au questionnaire</a>
                                </div>
                            @endforeach
                            @endif
                        @else
                        <p>Vous n'avez pas de questionnaires</p>
                        @endif
                    <!-- Nouvel utilisateur (ne devrait pas être là) -->
                    @else
                        <span>error :)</span>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
