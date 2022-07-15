<x-app-layout>
    <style>h3 {font-weight:bold;} .parent {display:flex; align-items:top; justify-content:space-between} .w33 {width:30%; display:inherit; align-items:center;flex-direction:column;}</style>
    <div class="gestion my-12 parent max-w-7xl mx-auto sm:px-6 lg:px-8">

        {{-- Si l'utilisateur est un administrateur --}}
        @if($user->role_id == 4)
            <div class="w33">
                <h3 class="uppercase">Membres</h3>
                <!-- pas sure des balises p -->
                @foreach($users as $a_user)
                    <p>{{$a_user->name}} {{$a_user->surname}}</p>
                @endforeach
                <a class="btnNav" href="{{route('users.index')}}">Voir</a>
            </div>
            <div class="w33">
                <h3 class="uppercase">Quizz</h3>
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
            <h2 class="titre block">Bienvenue {{$user->name}} !</h2>

        {{-- Si l'utilisateur est un élève--}}
        @elseif($user->role_id == 2)
            <h2 class="titre block">Bienvenue {{$user->name}} !</h2>

        {{-- Si l'utilisateur n'a pas de rôle assigné--}}
        @elseif($user->role_id == 1)
            <h2 class="titre block">Bienvenue !</h2>


        @endif
    </div>
</x-app-layout>