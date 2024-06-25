<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Series') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg flex justify-around">
                <div class="image-wrapper">
                    <img src="https://image.tmdb.org/t/p/w185/{{$serie->poster_path}}" alt="">
                </div>
                <div class="text-wrapper w-2/3 flex flex-col gap-4">
                    <div class="title">
                        <h2 class="text-white text-4xl"><b>{{ $serie->title }}</b></h2>
                    </div>
                    <div class="plot">
                        <h2 class="text-slate-400">{{ $serie->plot ? $serie->plot : "Brak danych o fabule" }}</h2>
                    </div>
                    <div class="genre">
                        <h2 class="text-white">{{ $serie->genre ? $serie->genre : "Brak danych o gatunkach" }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
