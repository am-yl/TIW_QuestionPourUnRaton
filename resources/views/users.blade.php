<x-app-layout>
    <div class="gestion my-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <h2 class="titre">Gérer vos utilisateurs</h2>
        <table>
            <thead>
                <tr>
                    <th class="p-2 mb-2 text-center">#</th>
                    <th class="p-2 mb-2">Prénom</th>
                    <th class="p-2 mb-2">Nom</th>
                    <th class="p-2 mb-2">Email</th>
                    <th class="p-2 mb-2">Rôle</th>
                    <th class="p-2 mb-2">Groupe</th>
                    {{-- <th class="p-2 mb-2">Nombre de questionnaires réalisés</th> --}}
                    <th class="p-2 mb-2">Actions</th>

                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td class="p-2 mb-2 text-center">{{ $user->id }}</td>
                        <td class="p-2 mb-2">{{ $user->name }}</td>
                        <td class="p-2 mb-2">{{ $user->surname }}</td>
                        <td class="p-2 mb-2">{{ $user->email }}</td>
                        <td class="p-2 mb-2">@if(isset($user->role)) {{ $user->role->name }} @endif</td>
                        <td class="p-2 mb-2">{{ $user->groupe->name }}</td>
                        {{-- <td class="p-2 mb-2">{{ dd($user->pivot) }}</td>
                        <td class="p-2 mb-2">{{ count($user->questionnaires->where('resultat', '>', 0)) }}</td> --}}
                        <td class="p-2 mb-2 text-center flex items-center justify-center">
                            <a href="{{ route('users.edit', $user->id) }}"><img class="voir" src="{{asset('/img/btn_voir.png')}}" alt=""></a>
                            <a href="{{ route('users.delete', $user->id) }}"><img class="supp" src="{{asset('/img/btn_supp.png')}}" alt=""></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>