<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Utilisateurs') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
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
                        <label for="type">Type d'utilisateur :</label>
                        <select name="type" id="type">
                            @foreach($types as $type => $value)
                            <option value="{{$type}}">{{$value}}</option>
                            @endforeach
                        </select>
                        <label for="groupe_id">Choisissez les groupes</label>
                        <select name="groupe_id" id="groupe_id">
                            @foreach($groupes as $groupe)
                            <option value="{{ $groupe->id }}">{{ $groupe->name }}</option>
                            @endforeach
                        </select>
                        <button type="submit">Enregistrer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>