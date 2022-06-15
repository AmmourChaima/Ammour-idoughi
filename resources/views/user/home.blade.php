<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                  Choisissez votre vaccin    
                  
                  <form class="w-full max-w-sm" action="/vaccin/polycliniques" method="POST">
                    @csrf
                    <div class="flex items-center border-b border-teal-500 py-2">
                        <select name="vaccin" class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline" style="margin-right: 15px">
                            @foreach($vaccins as $vaccin)
                            <option value="{{$vaccin->id}}">{{$vaccin->name}}</option> --}}
                            @endforeach
                          </select>
                          <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                          </div>
                      <button class="flex-shrink-0 bg-teal-500 hover:bg-teal-700 border-teal-500 hover:border-teal-700 text-sm border-4 text-white py-1 px-2 rounded" type="submit">
                        Rechercher
                      </button>
                    </div>
                  </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
