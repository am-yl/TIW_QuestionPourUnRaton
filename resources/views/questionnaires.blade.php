<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Questionnaires') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table>
                        <thead>
                            <tr>
                                <td class="p-2 mb-2">#</td>
                                <td class="p-2 mb-2">Intitulé du questionnaire</td>
                                <td class="p-2 mb-2">Description</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($questionnaires as $questionnaire)
                            <tr>
                                <td class="p-2 mb-2">{{ $questionnaire->id }}</td>
                                <td class="p-2 mb-2">{{ $questionnaire->name }}</td>
                                <td class="p-2 mb-2">{{ $questionnaire->description }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
