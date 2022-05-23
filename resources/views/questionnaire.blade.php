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
                    <p>{{ $questionnaire->name }}
                    <p class="mb-2">{{ $questionnaire->description }}</p>
                    <a href="{{ route('questionnaires.edit', $questionnaire->id)}}"  class="mb-2">Modifier le questionnaire</a>
                    <hr class="mb-2">

                    <!-- formulaire pour add une question dans le questionnaire -->
                    <form action="{{ route('questions.store') }}" method="post">
                        @csrf

                        <label for="name">Intitulé</label>
                        <input type="text" name="name" id="name" required>

                        <label for="rep[]">Réponses</label>
                        <label for="val[]">(cocher la/les bonne(s) réponse(s))</label>
                        <input type="text" name="rep[]" id="" required>
                        <input type="checkbox" name="val[]" id="">
                        <input type="text" name="rep[]" id="" required>
                        <input type="checkbox" name="val[]" id="">
                        <input type="text" name="rep[]" id="">
                        <input type="checkbox" name="val[]" id="">
                        <input type="text" name="rep[]" id="">
                        <input type="checkbox" name="val[]" id="">

                        <input type="hidden" name="questionnaire_id" value="{{ $questionnaire->id }}">

                        <button type="submit">Ajouter la question</button>
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
                                <?php
                                // on récupère le tableau des réponses
                                $reps = json_decode($q_question->reponses,true);
                                // $reps = ["bonne réponse" => true , "mauvaise réponse" => false];?>
                                <td class="p-2 mb-2">
                                @foreach ($reps as $keys => $values)
                                    {{ $keys }} ;
                                @endforeach
                                </td>
                                <td class="p-2 mb-3">
                                @foreach ($reps as $keys => $values)
                                    @if($values)
                                    {{ $keys }}
                                    @endif
                                @endforeach
                                </td>
                                <td class="p-2 mb-2"><a href="{{ route('questions.edit', $q_question->id) }}">Modifier</a> ; <a href="{{route('questions.delete',[$q_question->questionnaire_id, $q_question->id])}}">Supprimer</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
