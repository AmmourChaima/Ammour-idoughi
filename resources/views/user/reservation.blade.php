<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Polycliniques disponible') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-purple-300 border-b border-gray-200">
                    <form class="w-full max-w-sm" action="/polycliniques/reserver" method="POST">
                        @csrf
                        <input type="text" name="polyclinique_id" value="{{$poly->id}}" hidden>
                        <div class="md:flex md:items-center mb-6">
                          <div class="md:w-1/3">
                            <label class="block text-white font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
                             Polyclinique
                            </label>
                          </div>
                          <div class="md:w-2/3">
                            <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-full-name" type="text" value="{{$poly->name}}" disabled>
                          </div>
                        </div>
                        <div class="md:flex md:items-center mb-6">
                          <div class="md:w-1/3">
                            <label class="block text-white font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-password">
                              Vaccin
                            </label>
                          </div>
                          <div class="md:w-2/3">
                            <select name="vaccin" class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline" style="margin-right: 15px">
                                @foreach($poly->vaccins as $vaccin)
                                <option value="{{$vaccin->id}}">{{$vaccin->name}}</option> --}}
                                @endforeach
                              </select>                          </div>
                        </div>
                        
                        <div class="md:flex md:items-center mb-6">
                            <div class="md:w-1/3">
                                <label class="block text-white font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-password">
                                Date
                                </label>
                            </div>
                            <div class="relative md:w-2/3">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                                </div>
                                <input datepicker type="text" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date" name="date">
                            </div>
                        </div>

                        <div class="md:flex md:items-center">
                          <div class="md:w-1/3"></div>
                          <div class="md:w-2/3">
                            <button class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
                              Réserver
                            </button>
                          </div>
                        </div>
                      </form>     
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
