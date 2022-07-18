<x-app-layout>
    <div class="gestion my-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
        {{-- Prof ou Admin --}}
        @if($user->role_id == 3 || $user->role_id == 4)
            <a class="btnNav" href="{{ route('questionnaires.index') }}">&larr; Retour à la liste des questionnaires</a>
            <h2 class="titre">{{ $questionnaire->name }}</h2>
            <p class="desc">{{ $questionnaire->description }}</p>
            <a href="{{ route('questionnaires.edit', $questionnaire->id)}}" class="btnNav">Modifier le questionnaire</a>
            <hr class="mb-2">

            {{-- formulaire pour add une question dans le questionnaire --}}
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

                <label for="rep[]">Réponses (cocher la/les bonne(s) réponse(s))</label>

                @if(isset($question) && isset($reps))
                    <?php $i = 0 ;?>
                    @foreach($reps as $key => $value)
                    <div class="flex flex-row items-center justify-center mt-2">
                        <input class="mr-2" type="text" name="rep[]" value="{{ $key }}">
                        <input type="checkbox" name="{{$i}}" @if($value) checked @endif>
                    </div>
                    <?php $i++ ;?>
                    @endforeach
                @endif
                <?php if(!isset($i)) { $i=0;} ?>
                @for($i; $i < 4; $i++)
                <div class="flex flex-row items-center justify-center mt-2">
                    <input class="mr-2" type="text" name="rep[]">
                    <input type="checkbox" name="{{$i}}">
                </div>
                @endfor

                <input type="hidden" name="questionnaire_id" value="{{ $questionnaire->id }}">
                <button type="submit" class="btnNav submit">
                    @if(isset($question))
                        Modifier
                    @else
                        Ajouter
                    @endif la question
                </button>
            </form>


            {{-- on affiche les questions & réponses que si il y en a --}}
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
                        <td class="px-4 mb-2">{{$q_question->name}}</td>
                        <?php $reps = json_decode($q_question->reponses,true);?>
                        <td class="px-4 mb-2">
                        @foreach ($reps as $keys => $values)
                            {{ $keys }} ;
                        @endforeach
                        </td>
                        <td class="px-4 mb-2">
                        @foreach ($reps as $keys => $values)
                            @if($values)
                            {{ $keys }}
                            @endif
                        @endforeach
                        </td>
                        <td class="px-4 mb-2 text-center flex items-center justify-center">
                            <a href="{{ route('questionnaires.showedit',[$q_question->questionnaire_id, $q_question->id]) }}"><img class="voir" src="{{asset('/img/btn_voir.png')}}" alt=""></a>
                            <a href="{{route('questions.delete',[$q_question->questionnaire_id, $q_question->id])}}"><img class="supp" src="{{asset('/img/btn_supp.png')}}" alt=""></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
        {{-- Eleve --}}
        @elseif($user->role_id == 2)
        <form action="{{ route('questions.answer', $questionnaire->id) }}" method="post">
            @csrf

            @foreach($questionnaire->questions as $eleve_question)
            <div class="my-2 flex flex-col">
                <h3 class="font-bold italic">{{ $eleve_question->name }}</h3>

                <?php $reponses = json_decode($eleve_question->reponses,true);?>
                @if(isset($reponses))
                @foreach($reponses as $key => $value)
                <div>

                    <input type="checkbox" name="{{$eleve_question->id}}-{{str_replace(' ', '_', $key)}}">
                    <label for="{{$eleve_question->id}}-{{str_replace(' ', '_', $key)}}">{{$key}}</label>
                </div>
                @endforeach
                @endif
            </div>
            @endforeach
            <button class="btnNav block" type="submit">Valider</button>
        </form>
        {{-- Nouvel utilisateur (ne devrait pas être là) --}}
        @else
        <span>error :)</span>
        @endif
    </div>
</x-app-layout>
