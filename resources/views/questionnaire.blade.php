<x-app-layout>
    <div class="gestion my-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <!-- Prof ou Admin -->
        @if(Auth::user()->role_id == 3 || Auth::user()->role_id == 4)
            <a href="{{ route('questionnaires.index') }}">&larr; Retour à la liste des questionnaires</a>
            <p>{{ $questionnaire->name }}</p>
            <p class="mb-2">{{ $questionnaire->description }}</p>
            <a href="{{ route('questionnaires.edit', $questionnaire->id)}}"  class="mb-2">Modifier le questionnaire</a>
            <hr class="mb-2">

            <!-- formulaire pour add une question dans le questionnaire -->
            @if(isset($question))
                <form action="{{ route('questions.update', $question->id) }}" method="post">
                    @method('put')
                <?php $reps = json_decode($question->reponses,true);?>
            @else
                <form action="{{ route('questions.store') }}" method="post">
            @endif
            @csrf
                <label for="name">Intitulé</label>
                <input type="text" name="name" id="name" value="@if(isset($question)) {{ $question->name }}  @endif" required>

                <label for="rep[]">Réponses</label>
                <label for="val[]">(cocher la/les bonne(s) réponse(s))</label>

                @if(isset($question) && isset($reps))
                    @foreach($reps as $key => $value)
                    <input type="text" name="rep[]" value="{{ $key }}">
                    <input type="checkbox" name="val[]" @if($value) checked @endif>
                    @endforeach
                @endif
                <?php $reste = 4; if(isset($reps)) { $reste = 4-(count($reps)); } ?>
                @for($i=0; $i < $reste; $i++)
                    <input type="text" name="rep[]">
                    <input type="checkbox" name="val[]">
                @endfor

                <input type="hidden" name="questionnaire_id" value="{{ $questionnaire->id }}">
                <button type="submit">
                    @if(isset($question))
                        Modifier
                    @else
                        Ajouter
                    @endif la question
                </button>
            </form>


            <!-- on affiche les questions & réponses que si il y en a -->
            @if(count($questionnaire->questions) > 0)
            <table>
                <thead>
                    <th>Intitulé</th>
                    <th>Réponses</th>
                    <th>Bonne réponse</th>
                    <th>Actions</th>
                </thead>
                <tbody>
                    @foreach($questionnaire->questions as $q_question)
                    <tr>
                        <td class="p-2 mb-2">{{$q_question->name}}</td>
                        <?php $reps = json_decode($q_question->reponses,true);?>
                        <td class="p-2 mb-2">
                        @foreach ($reps as $keys => $values)
                            {{ $keys }} ;
                        @endforeach
                        </td>
                        <td class="p-2 mb-2">
                        @foreach ($reps as $keys => $values)
                            @if($values)
                            {{ $keys }}
                            @endif
                        @endforeach
                        </td>
                        <td class="p-2 mb-2">
                            <a href="{{ route('questionnaires.showedit',[$q_question->questionnaire_id, $q_question->id]) }}"><img class="voir" src="{{asset('/img/btn_voir.png')}}" alt=""></a>
                            <a href="{{route('questions.delete',[$q_question->questionnaire_id, $q_question->id])}}"><img class="supp" src="{{asset('/img/btn_supp.png')}}" alt=""></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
        <!-- Eleve -->
        @elseif(Auth::user()->role_id == 2)
        <form action="{{ route('questions.answer', $questionnaire->id) }}" method="post">
            @csrf

            @foreach($questionnaire->questions as $eleve_question)

                <h3>{{ $eleve_question->name }}</h3>

                <?php $reponses = json_decode($eleve_question->reponses,true);?>
                @if(isset($reponses))
                    @foreach($reponses as $key => $value)
                    <input type="checkbox" name="{{$eleve_question->id}}-{{$key}}">
                    <label for="{{$eleve_question->id}}-{{$key}}">{{$key}}</label>
                    @endforeach
                @endif
            @endforeach
            <button type="submit">Valider</button>
        </form>
        <!-- Nouvel utilisateur (ne devrait pas être là) -->
        @else
        <span>error :)</span>
        @endif
    </div>
</x-app-layout>
