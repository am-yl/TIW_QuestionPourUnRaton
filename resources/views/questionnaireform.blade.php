<x-app-layout>
    <div class="gestion my-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <a class="btnNav" href="{{ route('questionnaires.index') }}">&larr; Retour à la liste des questionnaires</a>
        <h2 class="titre">Ajouter un questionnaire</h2>
        @if (isset($questionnaire))
            <form action="{{ route('questionnaires.update', $questionnaire->id) }}" method="post">
                @method('put')
        @else
            <form action="{{ route('questionnaires.store') }}" method="post">
        @endif
            <p class="italic mb-2">Ajout des questions uniquement dans les questionnaires</p>
            @csrf
            @if(isset($questionnaire))
                <label for="name">Changer le nom du questionnaire : </label>
                <input type="text" name="name" id="name" value="{{ $questionnaire->name }}">
                <label for="description">Changer la description du questionnaire : </label>
                <input type="text" name="description" id="description" value="{{ $questionnaire->description }}">
            @else
                <label for="name">Nom du questionnaire</label>
                <input type="text" name="name" id="name" placeholder="Nom">
                <label for="description">Description du questionnaire</label>
                <input type="text" name="description" id="description" placeholder="Description">
            @endif
            {{-- select pour choisir les groupes du questionnaires --}}
            <label for="groupe_id">Choisissez les groupes</label>
            <select class="block" name="groupe_id[]" id="groupe_id" multiple>
                @foreach($groupes as $groupe)
                <option value="{{ $groupe->id }}">{{ $groupe->name }}</option>
                @endforeach
            </select>
            {{-- on affiche chaque groupe du questionnaire --}}
            @if(isset($questionnaire))
                @foreach($questionnaire->groupes as $q_groupe)
                    <span>{{ $q_groupe->name }}</span>
                @endforeach
            @endif
            <button type="submit" class="btnNav submit">Enregistrer</button>
        </form>
    </div>
</x-app-layout>