@extends('layouts.homes')

@section('title', 'Daftar Artikel')

@section('content')
    <div class="max-w-7xl mx-auto px-4 py-12">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold">Daftar Artikel</h1>
            <div class="flex space-x-2">
                <form action="{{ route('home') }}" method="GET" class="flex">
                    <input type="text" name="search" placeholder="Cari artikel..."
                        class="px-4 py-2 border rounded-l-md focus:outline-none focus:ring-2 focus:ring-primary-500"
                        value="{{ request('search') }}">
                    <button type="submit" class="px-4 py-2 bg-primary-600 text-white rounded-r-md hover:bg-primary-700">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
            </div>
        </div>

        @if ($articles->count())
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($articles as $article)
                    <article
                        class="news-card bg-white dark:bg-gray-800 rounded-xl overflow-hidden shadow-md hover:shadow-lg transition-shadow">
                        <div class="relative overflow-hidden h-48">
                            <img src="{{ $article->image ? asset('storage/' . $article->image) : 'https://picsum.photos/600/400' }}"
                                alt="{{ $article->title }}"
                                class="w-full h-full object-cover transition-transform duration-500 hover:scale-105" />
                            <span
                                class="absolute top-3 left-3 bg-primary-600 text-white text-xs px-2 py-1 rounded">{{ $article->category->name }}</span>
                        </div>
                        <div class="p-5">
                            <span
                                class="text-sm text-gray-500 dark:text-gray-400">{{ $article->published_at->format('d M Y') }}</span>
                            <h3 class="news-title text-xl font-semibold mt-2 mb-3 transition-colors">
                                {{ $article->title }}
                            </h3>
                            <p class="text-gray-600 dark:text-gray-300 line-clamp-2">
                                {{ Str::limit(strip_tags($article->content), 100) }}
                            </p>
                            <div class="flex justify-between items-center mt-4">
                                <a href="{{ route('articles.show', $article->slug) }}"
                                    class="text-primary-600 dark:text-primary-400 hover:underline">Baca Selengkapnya →</a>
                                <span class="text-xs text-gray-500 dark:text-gray-400">
                                    <i class="fas fa-eye mr-1"></i>{{ $article->views }}
                                </span>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>

            <div class="mt-8">
                {{ $articles->links() }}
            </div>
        @else
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-8 text-center">
                <i class="fas fa-newspaper text-4xl text-gray-400 mb-4"></i>
                <h3 class="text-xl font-medium text-gray-600 dark:text-gray-300">Tidak ada artikel ditemukan</h3>
                <p class="text-gray-500 dark:text-gray-400 mt-2">Silakan coba dengan kata kunci lain</p>
            </div>
        @endif
    </div>
@endsection
