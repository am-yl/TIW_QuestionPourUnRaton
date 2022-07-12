<x-app-layout>
    <!-- Prof ou Admin -->
    @if(Auth::user()->role_id == 3 || Auth::user()->role_id == 4)
        <div class="gestion my-12">
            <h2 class="titre">Gérer vos quizz</h2>
            <a class="creation inline-block my-8" href="{{ route('questionnaires.new') }}">Créer un nouveau questionnaire</a>
            @if($questionnaires != false)
                <table>
                    <thead>
                        <tr>
                            <th class="p-2 mb-2">ID</th>
                            <th class="p-2 mb-2">Intitulé</th>
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
                                    <td class="p-2 mb-2 text-center">{{ $questionnaire->name }}</td>
                                    <td class="p-2 mb-2 text-center">{{ $questionnaire->description }}</td>
                                    <td class="p-2 mb-2 text-center">{{ count($questionnaire->questions) }}</td>
                                    <td class="p-2 mb-2 text-center">
                                        @foreach ($questionnaire->groupes as $q_groupe)
                                        {{ $q_groupe->name }} ;
                                        @endforeach
                                    </td>
                                    <td class="p-2 mb-2 text-center flex flex-col items-center justify-center">
                                        <a href="{{ route('questionnaires.show',$questionnaire->id) }}"><img class="voir" src="{{asset('/img/btn_voir.png')}}" alt=""></a>
                                        <a href="{{route('questionnaires.delete',$questionnaire->id)}}"><img class="supp" src="{{asset('/img/btn_supp.png')}}" alt=""></a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                        <p>Vous n'avez pas de questionnaires</p>
                        @endif
                    </tbody>
                </table>
            @endif
        </div>

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
                            {{ Auth::user()->questionnaires->where('id', '=', $questionnaire->id)->resultat }}/20
                            @else
                            Non Applicable
                            @endif
                        </p>
                        <p>
                            @if (isset(Auth::user()->questionnaires->where('id', '=', $questionnaire->id)->resultat))
                                Fait !
                            @else
                                <a href="{{ route('questionnaires.show', $questionnaire->id) }}">Répondre au questionnaire</a>
                            @endif
                        </p>
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
</x-app-layout>