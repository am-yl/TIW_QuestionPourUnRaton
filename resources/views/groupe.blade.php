<x-app-layout>
    <div class="gestion my-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <a class="btnNav" href="{{ route('groupes.index')}}">&larr; Voir les groupes</a>
        <h2 class="titre">{{ $groupe->name }}</h2>
        <p class="desc">{{ $groupe->description }}</p>
        <a class="btnNav" href="{{ route('groupes.edit', $groupe->id) }}">Modifier le groupe</a>
        <h4 class="desc">Professeur :</h4>
        <p> @foreach($groupe->users->where('role_id', '3') as $prof) {{$prof->name}} {{$prof->surname}} @endforeach</p>
        <p class="desc">Liste des élèves :</p>
        <ul>
            @foreach($groupe->users->where('role_id','2') as $g_eleve)
            <li>
                {{ $g_eleve->name }} {{ $g_eleve->surname }}
            </li>
            @endforeach
        </ul>
        @if($groupe->id != 1)
        <form action="{{ route('users.add_group', $groupe->id) }}" method="post">
            @csrf
            @method('put')
            <label for="user_id">Ajouter des élèves</label>
            <select name="user_id[]" id="user_id" multiple>
                @foreach($eleves as $eleve)
                <option value="{{ $eleve->id }}">{{ $eleve->name }} {{ $eleve->surname }}</option>
                @endforeach
            </select>
            <button type="submit">Enregistrer</button>
        </form>
        @endif
    </div>
</x-app-layout>