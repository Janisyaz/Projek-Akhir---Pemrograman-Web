@extends('layouts.homes')

@section('title', 'Berita Terkini')

@section('content')
    <!-- Hero Section -->
    <section class="bg-gradient-to-r from-primary-500 to-secondary-500 text-white">
        <div class="max-w-7xl mx-auto px-4 py-16 md:py-24">
            <div class="max-w-3xl">
                <span class="inline-block px-3 py-1 bg-white/20 backdrop-blur-md rounded-full text-sm mb-4">Berita
                    Terkini</span>
                <h1 class="text-4xl md:text-5xl font-bold leading-tight mb-4">
                    Perkembangan Terbaru di Dunia Teknologi dan Bisnis Digital
                </h1>
                <p class="text-lg opacity-90 mb-6">
                    Baca analisis mendalam tentang tren terbaru yang mengubah lanskap industri teknologi
                    global.
                </p>
                <div class="flex flex-wrap gap-3">
                    <a href="#latest"
                        class="px-6 py-3 bg-white text-primary-700 hover:bg-gray-100 rounded-md font-medium transition">Baca
                        Sekarang</a>
                    <a href="#categories"
                        class="px-6 py-3 bg-white/10 hover:bg-white/20 backdrop-blur-md rounded-md font-medium transition">Lihat
                        Edisi Lain</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 py-12">
        <!-- Featured News -->
        <section class="mb-16">
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-2xl font-bold">Berita Utama</h2>

            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($featuredArticles as $article)
                    <a href="{{ route('articles.show', $article->slug) }}"
                        class="news-card bg-white dark:bg-gray-800 rounded-xl overflow-hidden shadow-md hover:shadow-lg transition-shadow block">
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
                            <div class="inline-block mt-4 text-primary-600 dark:text-primary-400 hover:underline">Baca
                                Selengkapnya →</div>
                        </div>
                    </a>
                @endforeach
            </div>
        </section>

        <!-- Latest News -->
        <section class="mb-16">
            <div class="flex justify-between items-center mb-8" id="latest">
                <h2 class="text-2xl font-bold">Berita Terbaru</h2>
                {{-- <a href="{{ route('articles.index') }}" class="text-primary-600 dark:text-primary-400 hover:underline">Lihat
                    Semua</a> --}}
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach ($latestArticles as $article)
                    <a href="{{ route('articles.show', $article->slug) }}"
                        class="news-card bg-white dark:bg-gray-800 rounded-lg overflow-hidden shadow hover:shadow-md transition-shadow block">
                        <div class="relative h-40">
                            <img src="{{ $article->image ? asset('storage/' . $article->image) : 'https://picsum.photos/600/400' }}"
                                alt="{{ $article->title }}" class="w-full h-full object-cover" />
                        </div>
                        <div class="p-4">
                            <span
                                class="text-xs text-gray-500 dark:text-gray-400">{{ $article->published_at->format('d M Y') }}</span>
                            <h3 class="news-title font-medium mt-1 mb-2 transition-colors">
                                {{ Str::limit($article->title, 60) }}
                            </h3>
                            <div class="text-xs text-primary-600 dark:text-primary-400 hover:underline">Baca →</div>
                        </div>
                    </a>
                @endforeach
            </div>
        </section>

        <!-- Categories Section -->
        <section class="mb-16">
            <div class="flex justify-between items-center mb-8" id="categories">
                <h2 class="text-2xl font-bold">Kategori Berita</h2>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4">
                @foreach ($categories as $category)
                    <a href="{{ route('categories.show', $category->slug) }}"
                        class="bg-white dark:bg-gray-800 rounded-lg p-6 shadow hover:shadow-md transition-shadow text-center">
                        <div class="text-primary-600 dark:text-primary-400 mb-2">
                            <i class="fas fa-folder-open text-2xl"></i>
                        </div>
                        <h3 class="font-medium">{{ $category->name }}</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">{{ $category->articles_count }} Artikel
                        </p>
                    </a>
                @endforeach
            </div>
        </section>

        <!-- Sorotan Minggu Ini -->
        <section class="bg-gray-100 dark:bg-gray-800 rounded-xl p-8 md:p-12">
            <div class="max-w-5xl mx-auto">
                <h2 class="text-2xl md:text-3xl font-bold text-center mb-6">Sorotan Minggu Ini</h2>
                <p class="text-center text-gray-600 dark:text-gray-300 mb-10">
                    Beberapa artikel pilihan dari berita terbaru yang patut Anda baca.
                </p>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @foreach ($latestArticles->take(2) as $article)
                        <a href="{{ route('articles.show', $article->slug) }}"
                            class="bg-white dark:bg-gray-700 rounded-lg overflow-hidden shadow hover:shadow-md transition block">
                            <div class="h-48 overflow-hidden">
                                <img src="{{ $article->image ? asset('storage/' . $article->image) : 'https://picsum.photos/600/400' }}"
                                    alt="{{ $article->title }}" class="w-full h-full object-cover">
                            </div>
                            <div class="p-5">
                                <h3 class="text-lg font-semibold mb-2">{{ $article->title }}</h3>
                                <p class="text-sm text-gray-600 dark:text-gray-300 mb-3">
                                    {{ Str::limit(strip_tags($article->content), 100) }}
                                </p>
                                <span class="text-xs text-primary-600 dark:text-primary-400">
                                    {{ $article->published_at->format('d M Y') }}
                                </span>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>


    </div>
@endsection
