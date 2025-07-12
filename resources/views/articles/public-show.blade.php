@extends('layouts.homes')

@section('title', $article->title)

@section('content')
    <div class="max-w-7xl mx-auto px-4 py-12">
        <!-- Breadcrumb -->
        <nav class="flex mb-6" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="{{ route('home') }}"
                        class="inline-flex items-center text-sm text-gray-700 hover:text-primary-600 dark:text-gray-400 dark:hover:text-white">
                        <i class="fas fa-home mr-2"></i>
                        Beranda
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <i class="fas fa-chevron-right text-gray-400"></i>
                        <a href="{{ route('categories.show', $article->category->slug) }}"
                            class="ml-1 text-sm text-gray-700 hover:text-primary-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">
                            {{ $article->category->name }}
                        </a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <i class="fas fa-chevron-right text-gray-400"></i>
                        <span
                            class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">{{ Str::limit($article->title, 30) }}</span>
                    </div>
                </li>
            </ol>
        </nav>

        <!-- Article Content -->
        <article class="bg-white dark:bg-gray-800 rounded-xl shadow-md overflow-hidden mb-8">
            @if ($article->image)
                <div class="relative h-96 w-full">
                    <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}"
                        class="w-full h-full object-cover">
                </div>
            @endif

            <div class="p-6 md:p-8">
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <span
                            class="inline-block px-3 py-1 bg-primary-100 text-primary-800 text-xs font-medium rounded-full dark:bg-primary-900 dark:text-primary-300">
                            {{ $article->category->name }}
                        </span>
                    </div>
                    <span class="text-sm text-gray-500 dark:text-gray-400">
                        <i class="far fa-calendar-alt mr-1"></i>{{ $article->published_at->format('d M Y') }}
                    </span>
                </div>

                <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-4">{{ $article->title }}</h1>

                <div class="flex items-center mb-6">
                    <div class="flex-shrink-0 mr-3">
                        <img class="w-8 h-8 rounded-full"
                            src="https://ui-avatars.com/api/?name={{ urlencode($article->author->name) }}&background=random"
                            alt="{{ $article->author->name }}">
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-900 dark:text-white">{{ $article->author->name }}</p>
                        <div class="flex space-x-1 text-sm text-gray-500 dark:text-gray-400">
                            <span><i class="fas fa-eye mr-1"></i>{{ $article->views }}x dilihat</span>
                        </div>
                    </div>
                </div>

                <div class="prose max-w-none dark:prose-invert mb-8">
                    {!! $article->content !!}
                </div>

                <div class="flex flex-wrap gap-2 mb-8">
                    @foreach (explode(',', $article->tags) as $tag)
                        @if (trim($tag))
                            <span
                                class="px-3 py-1 bg-gray-100 text-gray-800 text-xs font-medium rounded-full dark:bg-gray-700 dark:text-gray-300">#{{ trim($tag) }}</span>
                        @endif
                    @endforeach
                </div>

                <div class="border-t border-gray-200 dark:border-gray-700 pt-4 flex justify-between items-center">
                    {{-- <div class="flex space-x-4">
                        <button class="text-gray-500 hover:text-primary-600 dark:hover:text-primary-400">
                            <i class="far fa-thumbs-up"></i> Suka
                        </button>
                        <button class="text-gray-500 hover:text-primary-600 dark:hover:text-primary-400">
                            <i class="far fa-share-square"></i> Bagikan
                        </button>
                    </div> --}}
                    <div class="text-sm text-gray-500 dark:text-gray-400">
                        Terakhir diperbarui: {{ $article->updated_at->diffForHumans() }}
                    </div>
                </div>
            </div>
        </article>

        <!-- Related Articles -->
        @if ($relatedArticles->count())
            <section class="mb-8">
                <h2 class="text-2xl font-bold mb-4">Artikel Terkait</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($relatedArticles as $related)
                        <article
                            class="news-card bg-white dark:bg-gray-800 rounded-lg overflow-hidden shadow hover:shadow-md transition-shadow">
                            <div class="relative h-40">
                                <img src="{{ $related->image ? asset('storage/' . $related->image) : 'https://picsum.photos/600/400' }}"
                                    alt="{{ $related->title }}" class="w-full h-full object-cover" />
                            </div>
                            <div class="p-4">
                                <span
                                    class="text-xs text-gray-500 dark:text-gray-400">{{ $related->published_at->format('d M Y') }}</span>
                                <h3 class="news-title font-medium mt-1 mb-2 transition-colors">
                                    {{ Str::limit($related->title, 60) }}
                                </h3>
                                <a href="{{ route('articles.show', $related->slug) }}"
                                    class="text-xs text-primary-600 dark:text-primary-400 hover:underline">Baca →</a>
                            </div>
                        </article>
                    @endforeach
                </div>
            </section>
        @endif

        <!-- Comments Section -->
        <section class="bg-white dark:bg-gray-800 rounded-xl shadow-md overflow-hidden p-6 md:p-8">
            <h2 class="text-2xl font-bold mb-6">Komentar</h2>

            @if ($approvedComments->count())
                <div class="space-y-6 mb-8">
                    @foreach ($approvedComments as $comment)
                        <div class="flex">
                            <div class="flex-shrink-0 mr-4">
                                <img class="w-10 h-10 rounded-full"
                                    src="https://ui-avatars.com/api/?name={{ urlencode($comment->name) }}&background=random"
                                    alt="{{ $comment->name }}">
                            </div>
                            <div>
                                <div class="bg-gray-100 dark:bg-gray-700 rounded-lg p-4">
                                    <div class="flex items-center mb-2">
                                        <h4 class="font-medium text-gray-900 dark:text-white">{{ $comment->name }}</h4>
                                        <span class="mx-2 text-gray-400">•</span>
                                        <span
                                            class="text-xs text-gray-500 dark:text-gray-400">{{ $comment->created_at->diffForHumans() }}</span>
                                    </div>
                                    <p class="text-gray-700 dark:text-gray-300">{{ $comment->content }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-8">
                    <i class="far fa-comment-dots text-4xl text-gray-400 mb-3"></i>
                    <p class="text-gray-500 dark:text-gray-400">Belum ada komentar. Jadilah yang pertama berkomentar!</p>
                </div>
            @endif

            <!-- Comment Form -->
            <div class="mt-8">
                <h3 class="text-lg font-medium mb-4">Tinggalkan Komentar</h3>
                <form action="{{ route('comments.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="article_id" value="{{ $article->id }}">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label for="name"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Nama</label>
                            <input type="text" id="name" name="name" required
                                class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-primary-500 dark:bg-gray-700 dark:border-gray-600"
                                placeholder="Nama Anda">
                        </div>
                        <div>
                            <label for="email"
                                class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Email</label>
                            <input type="email" id="email" name="email" required
                                class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-primary-500 dark:bg-gray-700 dark:border-gray-600"
                                placeholder="Email Anda">
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="content"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Komentar</label>
                        <textarea id="content" name="content" rows="4" required
                            class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-primary-500 dark:bg-gray-700 dark:border-gray-600"
                            placeholder="Tulis komentar Anda..."></textarea>
                    </div>

                    <button type="submit"
                        class="px-6 py-2 bg-primary-600 hover:bg-primary-700 text-white rounded-md font-medium transition">
                        Kirim Komentar
                    </button>
                </form>
            </div>
        </section>
    </div>
@endsection
