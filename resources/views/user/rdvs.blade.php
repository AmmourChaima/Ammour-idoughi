<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mes Rendez-vous') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-purple-300 border-b border-gray-200">
                   
                    <div class="container mx-auto px-4 sm:px-8 max-w-5xl">
                        <div class="py-8">
                            <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                                <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                                    <table class="min-w-full leading-normal">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                                                    Polyclinique
                                                </th>
                                                <th scope="col" class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                                                    Vaccin
                                                </th>
                                                <th scope="col" class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                                                    1ere dose
                                                </th>
                                                <th scope="col" class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                                                    2eme dose
                                                </th>
                                                <th scope="col" class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800  text-left text-sm uppercase font-normal">
                                                    Action
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($rdvs as $rdv)
                                            <tr>
                                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                    <p class="text-gray-900 whitespace-no-wrap">
                                                        {{$rdv->polyclinique}}
                                                    </p>
                                                </td>
                                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                    <p class="text-gray-900 whitespace-no-wrap">
                                                        {{$rdv->vaccin}}
                                                    </p>
                                                </td>
                                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                    <p class="text-gray-900 whitespace-no-wrap">
                                                        {{$rdv->first_shot}}
                                                    </p>
                                                </td>
                                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                    <p class="text-gray-900 whitespace-no-wrap">
                                                        {{$rdv->second_shot}}
                                                    </p>
                                                </td>
                                                <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                                    @if(!$rdv->extended && !$rdv->confirmed)
                                                    <form action="/rvd/{{$rdv->id}}/expand" method="POST">
                                                        @csrf
                                                        <input type="text" name="id" value="{{$rdv->id}}" hidden>
                                                        <button type="submit">
                                                            <span class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                                                                <span aria-hidden="true" class="absolute inset-0 bg-green-200 opacity-50 rounded-full">
                                                                </span>
                                                                <span class="relative">
                                                                    Expand
                                                                </span>
                                                            </span>
                                                        </button>    
                                                    </form>                                                        
                                                    @else
                                                    {{-- <p class="text-gray-900 whitespace-no-wrap"> --}}
                                                        <button class="font-bold py-1 px-3 bg-green-200 opacity-50 rounded-full cursor-not-allowed">
                                                            Expand
                                                          </button>
                                                    {{-- </p> --}}
                                                    @endif
                                                    @if($rdv->confirmed)
                                                    {{-- <form action="/rvd/{{$rdv->id}}/pass" method="GET">
                                                        @csrf --}}
                                                        <input type="text" name="id" value="{{$rdv->id}}" hidden>
                                                        <a href="/pass/{{$rdv->qr_id}}">
                                                            <span class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                                                                <span aria-hidden="true" class="absolute inset-0 bg-green-200 opacity-50 rounded-full">
                                                                </span>
                                                                <span class="relative">
                                                                    Télécharger PS
                                                                </span>
                                                            </span>
                                                        </a>    
                                                    {{-- </form>                                                         --}}
                                                    @else
                                                    {{-- <p class="text-gray-900 whitespace-no-wrap"> --}}
                                                        <button class="font-bold py-1 px-3 bg-green-200 opacity-50 rounded-full cursor-not-allowed">
                                                            Télécharger PS
                                                          </button>
                                                    {{-- </p> --}}



                                                    @endif
                                                    
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
