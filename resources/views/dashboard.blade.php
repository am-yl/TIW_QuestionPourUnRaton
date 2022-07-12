<x-app-layout>
    <style>h3 {font-weight:bold;} .parent {display:flex; align-items:top; justify-content:space-between} .w33 {width:30%; display:inherit; align-items:center;flex-direction:column;}</style>
    <div class="gestion my-12 parent max-w-7xl mx-auto sm:px-6 lg:px-8">
        @if(Auth::user()->role_id == 4)
        <div class="w33">
            <h3 class="uppercase">Membres</h3>
            <!-- pas sure des balises p -->
            @foreach($users as $user)
                <p>{{$user->name}} {{$user->surname}}</p>
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
        @elseif(Auth::user()->role_id == 3)


        @endif
    </div>
</x-app-layout>