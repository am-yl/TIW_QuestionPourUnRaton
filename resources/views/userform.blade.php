<x-app-layout>
    <div class="gestion my-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
        @if (isset($user))
            <a href="{{ route('users.index') }}">&larr; Retour à la liste des utilisateurs</a>
            <form action="{{ route('users.update', $user->id) }}" method="post">
                @method('put')
            @csrf
                <label for="name">Prénom</label>
                <input type="text" name="name" id="name" value="{{ $user->name }}">
                <label for="surname">Nom</label>
                <input type="text" name="surname" id="surname" value="{{ $user->surname }}">
                <label for="email">Email</label>
                <input type="text" name="email" id="email" value="{{ $user->email }}">
        @endif
            <label for="role_id">Type d'utilisateur :</label>
            <select name="role_id" id="role_id">
                @foreach($roles as $role)
                    @if($user->role_id == $role->id)
                    <option value="{{$role->id}}" selected>{{$role->name}}</option>
                    @else
                    <option value="{{$role->id}}">{{$role->name}}</option>
                    @endif
                @endforeach
            </select>
            <label for="groupe_id">Choisissez les groupes</label>
            <select name="groupe_id" id="groupe_id">
                @foreach($groupes as $groupe)
                    @if($user->groupe_id == $groupe->id)
                    <option value="{{$groupe->id}}" selected>{{$groupe->name}}</option>
                    @else
                    <option value="{{ $groupe->id }}">{{ $groupe->name }}</option>
                    @endif
                @endforeach
            </select>
            <button type="submit">Enregistrer</button>
        </form>
    </div>
</x-app-layout>