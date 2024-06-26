<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Movies') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg flex justify-around">
                <div class="image-wrapper">
                    <img src="https://image.tmdb.org/t/p/w185/{{$movie->poster_path}}" alt="">
                </div>
                <div class="text-wrapper w-2/3 flex flex-col gap-4">
                    <div class="title">
                        <h2 class="text-white text-4xl"><b>{{ $movie->title }}</b></h2>
                    </div>
                    <div class="plot">
                        <h3 class="text-white">{{ __('messages.table.plot') }}:</h3>
                        <h2 class="text-slate-400">{{ $movie->plot ? $movie->plot : __('messages.table.no_data') }}</h2>
                    </div>
                    <div class="genre">
                        <h3 class="text-white">{{ __('messages.table.genres') }}:</h3>
                        @forelse ($genresList as $genre)
                            <h2 class="text-slate-400">{{ $genre->name }}</h2>
                            @empty
                            <h2 class="text-slate-400">{{ __('messages.table.no_data') }}</h2>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
