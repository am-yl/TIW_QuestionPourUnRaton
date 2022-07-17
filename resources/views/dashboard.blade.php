<x-app-layout>
    <style>h3 {font-weight:bold;} .parent {display:flex; align-items:top; justify-content:space-between} .w33 {width:30%; display:inherit; align-items:center;flex-direction:column;}</style>
    {{-- Si l'utilisateur est un administrateur --}}
    @if($user->role_id == 4)
        <div class="gestion my-12 parent max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="w33">
                <h3 class="uppercase">Membres</h3>
                <!-- pas sure des balises p -->
                @foreach($users as $a_user)
                    <p>{{$a_user->name}} {{$a_user->surname}}</p>
                @endforeach
                <a class="btnNav" href="{{route('users.index')}}">Voir</a>
            </div>
            <div class="w33">
                <h3 class="uppercase">Questionnaire</h3>
                @foreach($questionnaires as $questionnaire)
                    <p>{{$questionnaire->name}}</p>
                @endforeach
                <a class="btnNav" href="{{route('questionnaires.index')}}">Voir</a>
            </div>
            <div class="w33">
                <h3 class="uppercase">Groupes</h3>
                @foreach($groupes as $groupe)
                    <p>{{$groupe->name}}</p>
                @endforeach
                <a class="btnNav" href="{{route('groupes.index')}}">Voir</a>
            </div>

    {{-- Si l'utilisateur est un professeur --}}
    @elseif($user->role_id == 3)
    <div class="gestion my-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <h2 class="titre">Bienvenue {{$user->name}} !</h2>
        <a href="{{route('questionnaires.index')}}">Accéder à mes questionnaires</a>
        <a href="{{route('groupes.show', $user->groupe->id)}}">Voir mon groupe</a>

    {{-- Si l'utilisateur est un élève--}}
    @elseif($user->role_id == 2)
    <div class="gestion my-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <h2 class="titre block">Bienvenue {{$user->name}} !</h2>
        <a href="{{route('questionnaires.index')}}">Accéder à mes questionnaires</a>

    {{-- Si l'utilisateur n'a pas de rôle assigné--}}
    @elseif($user->role_id == 1)
    <div class="gestion my-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <h2 class="titre">Bienvenue {{$user->name}} !</h2>
        <p>Aucun rôle ne vous a été assigné, veuillez patientez encore un peu.</p>
        @endif
    </div>
</x-app-layout>