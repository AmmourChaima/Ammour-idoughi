<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Polycliniques disponible, Choisissez une') }}
        </h2>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-purple-300 border-b border-gray-200 grid gap-4 grid-cols-3 grid-rows-3">
                    @if (count($polys) != 0)
                    @foreach($polys as $poly)
                    <div class="overflow-hidden shadow-lg rounded-lg h-90 w-60 md:w-80 cursor-pointer">
                        <a href="/polycliniques/{{$poly->id}}/vaccin/{{$vaccin->id}}/reservation" class="w-full block h-full">
                            <div class="bg-white dark:bg-gray-800 w-full p-4">
                                
                                <p class="text-gray-800 dark:text-white text-xl font-medium mb-2">
                                    {{$poly->name}}
                                </p>
                                <p class="text-indigo-500 text-md font-medium">
                                    {{$poly->email}}
                                </p>
                                {{-- <p class="text-gray-400 dark:text-gray-300 font-light text-md">
                                    The new supercar is here, 543 cv and 140 000$. This is best racing GT about 7 years on...
                                </p> --}}
                                <div class="flex flex-wrap justify-starts items-center mt-4">
                                    @foreach($poly->vaccins as $vaccin)
                                    <div class="text-xs mr-2 py-1.5 px-4 text-gray-600 bg-blue-100 rounded-2xl">
                                        {{$vaccin->name}}
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </a>
                    </div>    
                    @endforeach 
                    @else 
                    <p>
                    Ooops ! <br>
                    Aucune polyclinique a le type de vaccin choisi
                    veuillez choisir un autre type svp.
                    </p>
                    @endif
                                
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
