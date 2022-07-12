<x-app-layout>
    <div class="gestion my-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <a href="{{ route('groupes.index') }}">&larr; Retour à la liste des groupes</a>
        @if(isset($groupe))
        <form action="{{ route('groupes.update', $groupe->id) }}" method="post">
        @method('put')
        @else
        <form action="{{ route('groupes.store') }}" method="post">
        @endif
        @csrf

        <label for="name">Nom du groupe</label>
        @if(isset($groupe))
            <input type="text" id="name" name="name" value="{{ $groupe->name }}">
            <label for="description">Description du groupe</label>
            <input type="text" id="description" name="description" value="{{ $groupe->description }}">
        @else
            <input type="text" id="name" name="name">
            <label for="description">Description du groupe</label>
            <input type="text" id="description" name="description">
            @endif
            <label for="questionnaire_id">Sélectionnez les questionnaires</label>
            <select name="questionnaire_id[]" id="questionnaire_id" multiple>
                @foreach($questionnaires as $questionnaire)
                <option value="{{ $questionnaire->id }}">{{ $questionnaire->name }}</option>
                @endforeach
            </select>
        <button type="submit">Enregistrer</button>
        </form>
        </div>
    </div>
</x-app-layout>