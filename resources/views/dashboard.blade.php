<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Panneau d\'administration') }}
        </h2>
    </x-slot>

    <style>h3 {font-weight:bold;} .parent {display:flex; align-items:top; justify-content:space-between} .w33 {width:30%; display:inherit; align-items:center;flex-direction:column;}</style>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 parent">
                    @if(Auth::user()->role_id == 4)
                    <div class="w33">
                        <h3>Membres</h3>
                        <!-- pas sure des balises p -->
                        @foreach($users as $user)
                            <p>{{$user->name}} {{$user->surname}}</p>
                        @endforeach
                        <a href="{{route('users.index')}}">Voir</a>
                    </div>
                    <div class="w33">
                        <h3>Quizz</h3>
                        @foreach($questionnaires as $questionnaire)
                            <p>{{$questionnaire->name}}</p>
                        @endforeach
                        <a href="{{route('questionnaires.index')}}">Voir</a>
                    </div>
                    <div class="w33">
                        <h3>Groupes</h3>
                        @foreach($groupes as $groupe)
                            <p>{{$groupe->name}}</p>
                        @endforeach
                        <a href="{{route('groupes.index')}}">Voir</a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>