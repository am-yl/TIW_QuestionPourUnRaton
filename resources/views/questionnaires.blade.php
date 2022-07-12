<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Gérer vos quizz</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@700&display=swap" rel="stylesheet">


        <!-- Styles -->
        <style>
          /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.dark\:text-gray-500{--tw-text-opacity:1;color:#6b7280;color:rgba(107,114,128,var(--tw-text-opacity))}}
        </style>
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    </head>

<body>
    <div class="background">
    <img src="{{URL::asset('/img/background.jpg')}}" alt="">
    </div>

    <div class="raccoon">
    <img  class="raccoon" src="{{URL::asset('/img/raccoon.png')}}" alt="logo">
    </div>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        @if(Auth::user()->role_id == 2)
            {{ __('Mes questionnaires') }}
        @else
            {{ __('Gérer les questionnaires')}}
        @endif
        </h2>
    </x-slot>

    <!-- Prof ou Admin -->
    @if(Auth::user()->role_id == 3 || Auth::user()->role_id == 4)
        <div class="gestion">
            <h3 class="titre">Gérer vos quizz</h3>
            <a href="{{ route('questionnaires.new') }}">Créer un nouveau questionnaire</a>
            @if($questionnaires != false)
                <table>
                    <thead>
                        <tr>
                            <th class="p-2 mb-2">ID</th>
                            <th class="p-2 mb-2">Intitulé</th>
                            <th class="p-2 mb-2">Description</th>
                            <th class="p-2 mb-2">Nombre de questions</th>
                            <th class="p-2 mb-2">Groupe(s) assigné(s)</th>
                            <th class="p-2 mb-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($questionnaires) > 0)
                            @foreach ($questionnaires as $questionnaire)
                                <tr>
                                    <td class="p-2 mb-2 text-center">{{ $questionnaire->id }}</td>
                                    <td class="p-2 mb-2 text-center">{{ $questionnaire->name }}</td>
                                    <td class="p-2 mb-2 text-center">{{ $questionnaire->description }}</td>
                                    <td class="p-2 mb-2 text-center">{{ count($questionnaire->questions) }}</td>
                                    <td class="p-2 mb-2 text-center">
                                                    @foreach ($questionnaire->groupes as $q_groupe)
                                                    {{ $q_groupe->name }} ;
                                                    @endforeach
                                    </td>
                                    <td class="p-2 mb-2">
                                        <a href="{{ route('questionnaires.show',$questionnaire->id) }}"><img class="voir" src="{{URL::asset('/img/btn_voir.png')}}" alt=""></a>
                                        <a href="{{route('questionnaires.delete',$questionnaire->id)}}"><img  class="supp" src="{{URL::asset('/img/btn_supp.png')}}" alt=""></a></td>
                                    </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                        @else
                        <p>Vous n'avez pas de questionnaires</p>
                        @endif
                    <!-- Eleve -->
                    @elseif(Auth::user()->role_id == 2)
                        @if($questionnaires != false)
                            @if(count($questionnaires) > 0)
                            @foreach ($questionnaires as $questionnaire)
                                <div>
                                    <h4>{{ $questionnaire->name }}</h4>
                                    <p>{{ $questionnaire->description}}<br/>{{count($questionnaire->questions)}} questions</p>
                                    <p>Note :
                                        @if (isset(Auth::user()->questionnaires->where('id', '=', $questionnaire->id)->resultat))
                                        {{ Auth::user()->questionnaires->where('id', '=', $questionnaire->id)->resultat }} / {{ count($questionnaire->questions) }}
                                        @else
                                        Non Applicable
                                        @endif
                                    </p>
                                    <a href="{{ route('questionnaires.show', $questionnaire->id) }}">Répondre au questionnaire</a>
                                </div>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            @endif
        </div>

    <!-- Eleve -->
    @elseif(Auth::user()->role_id == 2)
        @if($questionnaires != false)
            @if(count($questionnaires) > 0)
                @foreach ($questionnaires as $questionnaire)
                    <div>
                        <h4>{{ $questionnaire->name }}</h4>
                        <p>{{ $questionnaire->description}}<br/>{{count($questionnaire->questions)}} questions</p>
                        <p>Note :
                            @if (isset(Auth::user()->questionnaires->where('id', '=', $questionnaire->id)->resultat))
                            {{ Auth::user()->questionnaires->where('id', '=', $questionnaire->id)->resultat }} / {{ count($questionnaire->questions) }}
                            @else
                            Non Applicable
                            @endif
                        </p>
                        <button>Répondre au questionnaire</button>
                    </div>
                @endforeach
            @endif
        @else
        <p>Vous n'avez pas de questionnaires</p>
        @endif
    <!-- Nouvel utilisateur (ne devrait pas être là) -->
    @else
        <span>error :)</span>
    @endif

</x-app-layout>
</body>