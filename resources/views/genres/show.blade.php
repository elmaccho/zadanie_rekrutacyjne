<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $genre->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mb-5">{{ __('messages.table.movies_where_genre') }} {{ $genre->name }}</h2>
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                {{ (__('messages.table.poster')) }}
                            </th>
                            <th scope="col" class="px-6 py-3">
                                {{ (__('messages.table.title')) }}
                            </th>
                            <th scope="col" class="px-6 py-3">
                                {{ (__('messages.table.plot')) }}
                            </th>
                            <th scope="col" class="px-6 py-3">
                                {{ (__('messages.table.see_more')) }}
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($movies as $movie)                            
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4">
                                    <img src="https://image.tmdb.org/t/p/w185/{{$movie->poster_path}}" alt="">
                                </th>
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <p>{{ $movie->title }}</p>
                                </td>
                                <td class="px-6 py-4" >
                                    <p class="truncate" style="width: 700px;">{{ $movie->plot ? $movie->plot : __('messages.table.no_data') }}</p>
                                </td>
                                <td class="px-6 py-4">
                                    <a href={{ route('movies.show', $movie->id) }}>{{ (__('messages.table.details')) }}</a>
                                </td>
                            </tr>
                            @empty
                            <td>
                                <h2 class="text-slate-400">{{ __('messages.table.no_data') }}</h2>
                            </td>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mb-5">{{ __('messages.table.series_where_genre') }} {{ $genre->name }}</h2>
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                {{ (__('messages.table.poster')) }}
                            </th>
                            <th scope="col" class="px-6 py-3">
                                {{ (__('messages.table.title')) }}
                            </th>
                            <th scope="col" class="px-6 py-3">
                                {{ (__('messages.table.plot')) }}
                            </th>
                            <th scope="col" class="px-6 py-3">
                                {{ (__('messages.table.see_more')) }}
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($series as $serie)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4">
                                    <img src="https://image.tmdb.org/t/p/w185/{{$serie->poster_path}}" alt="">
                                </th>
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <p>{{ $serie->title }}</p>
                                </td>
                                <td class="px-6 py-4" >
                                    <p class="truncate" style="width: 700px;">{{ $serie->plot ? $serie->plot : __('messages.table.no_data') }}</p>
                                </td>
                                <td class="px-6 py-4">
                                    <a href={{ route('series.show', $serie->id) }}>{{ (__('messages.table.details')) }}</a>
                                </td>
                            </tr>
                        @empty
                            <td>
                                <h2 class="text-slate-400">{{ __('messages.table.no_data') }}</h2>
                            </td>
                        @endforelse                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
