<x-app-layout>
    <div class="gestion my-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <h2 class="titre">Gérer vos groupes</h2>
        <a class="btnNav inline-block mt-6 mb-8" href="{{ route('groupes.new') }}">Ajouter un groupe</a>
        <table>
            <thead>
                <tr>
                    <th class="p-2 mb-2 text-center">#</th>
                    <th class="p-2 mb-2">Intitulé du questionnaire</th>
                    <th class="p-2 mb-2">Description</th>
                    <th class="p-2 mb-2">Professeur</th>
                    <th class="p-2 mb-2">Nombre de questionnaires</th>
                    <th class="p-2 mb-2">Nombre d'élèves</th>
                    <th class="p-2 mb-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($groupes as $groupe)
                    <tr>
                        <td class="px-4 mb-2 text-center">{{ $groupe->id }}</td>
                        <td class="px-4 mb-2">{{ $groupe->name }}</td>
                        <td class="px-4 mb-2">{{ $groupe->description }}</td>
                        <td class="px-4 mb-2">@foreach($groupe->users->where('role_id', '3') as $prof) {{$prof->name}} {{$prof->surname}} @endforeach</td>
                        <td class="px-4 mb-2">{{ count($groupe->questionnaires) }}</td>
                        <td class="px-4 mb-2">{{ count($groupe->users->where('role_id', '2')) }}</td>
                        <td class="px-4 mb-2 text-center flex items-center justify-center">
                            <a href="{{ route('groupes.show', $groupe->id) }}"><img class="voir" src="{{asset('/img/btn_voir.png')}}" alt=""></a>
                            @if(count($groupe->users->where('role_id', '3')) == 0 && count($groupe->users->where('role_id', '2')) == 0 && $groupe->id != 1)
                            <a href="{{ route('groupes.delete', $groupe->id) }}"><img class="supp" src="{{asset('/img/btn_supp.png')}}" alt=""></a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
