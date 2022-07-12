<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="{{ route('groupes.index')}}">&larr; voir les groupes</a>
                    <h3>titre : {{ $groupe->name }}</h3>
                    <p>desc : {{ $groupe->description }}</p>
                    <a href="{{ route('groupes.edit', $groupe->id) }}">Modifier le groupe</a>
                    <p>Professeur : @foreach($groupe->users->where('role_id', '3') as $prof) {{$prof->name}} {{$prof->surname}} @endforeach</p>
                    <h4>Liste des élèves :</h4>
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
            </div>
        </div>
    </div>
</x-app-layout>