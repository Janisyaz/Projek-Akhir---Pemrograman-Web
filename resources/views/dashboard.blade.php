@extends('layouts.app')

@section('title', 'Dashboard')
@section('header', 'Dashboard')

@section('content')
    <div class="px-4 py-5 sm:p-6">

        {{-- Alert success --}}
        @if (session('success'))
            <div
                class="mb-6 p-4 rounded-lg bg-emerald-50 border border-emerald-200 text-emerald-800 flex justify-between items-center">
                <div class="flex items-center">
                    <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                            clip-rule="evenodd" />
                    </svg>
                    <span class="font-medium">Berhasil!</span>
                    <span class="ml-2">{{ session('success') }}</span>
                </div>
                <button onclick="this.parentElement.remove()" class="text-emerald-600 hover:text-emerald-800">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
            </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            <!-- Stats Cards -->
            <div class="bg-gradient-to-br from-indigo-500 to-indigo-600 rounded-xl shadow-lg overflow-hidden text-white">
                <div class="p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 bg-white bg-opacity-20 rounded-lg p-3">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                            </svg>
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dt class="text-sm font-medium text-indigo-100 truncate">
                                Total Artikel
                            </dt>
                            <dd class="flex items-baseline">
                                <div class="text-2xl font-semibold">
                                    {{ $stats['articles'] }}
                                </div>
                            </dd>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-gradient-to-br from-green-500 to-green-600 rounded-xl shadow-lg overflow-hidden text-white">
                <div class="p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 bg-white bg-opacity-20 rounded-lg p-3">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4" />
                            </svg>
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dt class="text-sm font-medium text-green-100 truncate">
                                Total Kategori
                            </dt>
                            <dd class="flex items-baseline">
                                <div class="text-2xl font-semibold">
                                    {{ $stats['categories'] }}
                                </div>
                            </dd>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-gradient-to-br from-amber-500 to-amber-600 rounded-xl shadow-lg overflow-hidden text-white">
                <div class="p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 bg-white bg-opacity-20 rounded-lg p-3">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                            </svg>
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dt class="text-sm font-medium text-amber-100 truncate">
                                Total Komentar
                            </dt>
                            <dd class="flex items-baseline">
                                <div class="text-2xl font-semibold">
                                    {{ $stats['comments'] }}
                                </div>
                            </dd>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl shadow-lg overflow-hidden text-white">
                <div class="p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 bg-white bg-opacity-20 rounded-lg p-3">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dt class="text-sm font-medium text-blue-100 truncate">
                                Total Pengunjung
                            </dt>
                            <dd class="flex items-baseline">
                                <div class="text-2xl font-semibold">
                                    {{ $stats['visitors'] }}
                                </div>
                            </dd>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
            <!-- Recent Activity -->
            <!-- Ganti bagian visitor chart dengan ini -->
            <!-- Distribusi Artikel per Kategori -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg lg:col-span-2">
                <div class="px-6 py-5">
                    <div class="flex items-center justify-between">
                        <h3 class="text-lg font-semibold text-gray-800">
                            Distribusi Artikel per Kategori
                        </h3>
                        <span class="px-2 py-1 text-xs font-medium rounded-full bg-indigo-100 text-indigo-800">
                            Total: {{ $stats['articles'] }} Artikel
                        </span>
                    </div>

                    <div class="mt-6 space-y-5">
                        @foreach ($articlesByCategory as $category)
                            <div class="group">
                                <div class="flex items-center justify-between mb-1.5">
                                    <div class="flex items-center">
                                        <span
                                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-indigo-100 text-indigo-800">
                                            {{ $category->name }}
                                        </span>
                                        <span class="ml-2 text-xs text-gray-500">
                                            {{ number_format(($category->articles_count / max($stats['articles'], 1)) * 100, 1) }}%
                                        </span>
                                    </div>
                                    <span class="text-sm font-medium text-gray-700">
                                        {{ $category->articles_count }} artikel
                                    </span>
                                </div>

                                <div class="w-full bg-gray-100 rounded-full h-2.5 overflow-hidden">
                                    <div class="bg-gradient-to-r from-indigo-400 to-indigo-600 h-2.5 rounded-full transition-all duration-500 ease-out"
                                        style="width: {{ ($category->articles_count / max($stats['articles'], 1)) * 100 }}%">
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    @if (count($articlesByCategory) === 0)
                        <div class="mt-4 text-center py-6 bg-gray-50 rounded-lg">
                            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <h4 class="mt-2 text-sm font-medium text-gray-700">Belum ada artikel</h4>
                            <p class="mt-1 text-xs text-gray-500">Mulai buat artikel pertama Anda</p>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Popular Articles -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                <div class="px-6 py-5 border-b border-gray-100">
                    <h3 class="text-lg font-semibold text-gray-800 flex items-center">
                        <svg class="w-5 h-5 text-indigo-500 mr-2" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                        </svg>
                        Artikel Terpopuler
                    </h3>
                </div>
                <div class="p-6">
                    <div class="space-y-4">
                        @foreach ($popularArticles as $article)
                            <div class="flex items-start group">
                                <div
                                    class="flex-shrink-0 h-10 w-10 rounded-md bg-indigo-100 flex items-center justify-center group-hover:bg-indigo-200 transition-colors">
                                    <span class="text-indigo-600 font-medium">{{ $loop->iteration }}</span>
                                </div>
                                <div class="ml-4">
                                    <h4
                                        class="text-sm font-medium text-gray-900 group-hover:text-indigo-600 transition-colors">
                                        <a href="{{ route('articles.show', $article) }}">
                                            {{ Str::limit($article->title, 40) }}
                                        </a>
                                    </h4>
                                    <p class="text-xs text-gray-500 mt-1">
                                        <span class="inline-flex items-center">
                                            <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                            {{ $article->views }} views
                                        </span>
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Recent Articles -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                <div class="px-6 py-5 border-b border-gray-100">
                    <h3 class="text-lg font-semibold text-gray-800 flex items-center">
                        <svg class="w-5 h-5 text-indigo-500 mr-2" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                        </svg>
                        Artikel Terbaru
                    </h3>
                </div>
                <div class="p-6">
                    <div class="space-y-4">
                        @foreach ($recentArticles as $article)
                            <div class="flex items-start group">
                                <div class="flex-shrink-0">
                                    @if ($article->image)
                                        <img class="h-10 w-10 rounded-md object-cover"
                                            src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}">
                                    @else
                                        <div class="h-10 w-10 rounded-md bg-gray-100 flex items-center justify-center">
                                            <svg class="h-6 w-6 text-gray-400" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                        </div>
                                    @endif
                                </div>
                                <div class="ml-4">
                                    <h4
                                        class="text-sm font-medium text-gray-900 group-hover:text-indigo-600 transition-colors">
                                        <a href="{{ route('articles.edit', $article) }}">
                                            {{ Str::limit($article->title, 40) }}
                                        </a>
                                    </h4>
                                    <p class="text-xs text-gray-500 mt-1">
                                        <span class="inline-flex items-center">
                                            <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                            {{ $article->created_at->diffForHumans() }}
                                        </span>
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="mt-6">
                        <a href="{{ route('articles.index') }}"
                            class="text-sm font-medium text-indigo-600 hover:text-indigo-500 inline-flex items-center">
                            Lihat semua artikel
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Pending Comments -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                <div class="px-6 py-5 border-b border-gray-100">
                    <h3 class="text-lg font-semibold text-gray-800 flex items-center">
                        <svg class="w-5 h-5 text-indigo-500 mr-2" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                        </svg>
                        Komentar Menunggu Persetujuan
                    </h3>
                </div>
                <div class="p-6">
                    <div class="space-y-4">
                        @forelse($pendingComments as $comment)
                            <div class="flex items-start">
                                <div
                                    class="flex-shrink-0 h-10 w-10 rounded-full bg-indigo-100 flex items-center justify-center">
                                    <span
                                        class="text-indigo-600 text-sm font-medium">{{ substr($comment->name, 0, 1) }}</span>
                                </div>
                                <div class="ml-4">
                                    <h4 class="text-sm font-medium text-gray-900">
                                        {{ $comment->name }}
                                    </h4>
                                    <p class="text-sm text-gray-500 mt-1">
                                        {{ Str::limit($comment->content, 50) }}
                                    </p>
                                    <div class="mt-2 flex space-x-3">
                                        <form action="{{ route('comments.approve', $comment) }}" method="POST">
                                            @csrf
                                            <button type="submit"
                                                class="text-xs text-green-600 hover:text-green-500 inline-flex items-center">
                                                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M5 13l4 4L19 7" />
                                                </svg>
                                                Setujui
                                            </button>
                                        </form>
                                        <form action="{{ route('comments.destroy', $comment) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="text-xs text-red-600 hover:text-red-500 inline-flex items-center">
                                                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p class="text-sm text-gray-500 italic">Tidak ada komentar yang menunggu persetujuan</p>
                        @endforelse
                    </div>
                    <div class="mt-6">
                        <a href="{{ route('articles.index') }}"
                            class="text-sm font-medium text-indigo-600 hover:text-indigo-500 inline-flex items-center">
                            Kelola artikel
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
