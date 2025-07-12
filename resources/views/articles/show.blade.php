@extends('layouts.app')

@section('title', $article->title)
@section('header', $article->title)

@section('content')
    <div class="mb-4">
        <a href="{{ route('articles.index') }}"
            class="inline-flex items-center text-sm text-gray-600 hover:text-indigo-600 transition">
            ← Kembali ke Daftar Artikel
        </a>
    </div>

    <div class="bg-white overflow-hidden shadow rounded-lg">
        <div class="px-4 py-5 sm:p-6">
            {{-- Gambar Artikel --}}
            @if ($article->image)
                <div class="mb-6">
                    <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}"
                        class="w-full h-64 object-cover rounded-lg">
                </div>
            @endif

            {{-- Metadata Artikel --}}
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-6 gap-3">
                <div class="flex items-center flex-wrap gap-3 text-sm text-gray-500">
                    <span class="px-2 py-1 text-xs font-semibold rounded-full bg-indigo-100 text-indigo-800">
                        {{ $article->category->name }}
                    </span>
                    <span>{{ $article->created_at->format('d M Y') }}</span>
                    <span>{{ $article->views }} views</span>
                </div>
                <div>
                    <span
                        class="px-2 py-1 text-xs font-semibold rounded-full
                        {{ $article->published ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                        {{ $article->published ? 'Published' : 'Draft' }}
                    </span>
                </div>
            </div>

            {{-- Konten Artikel --}}
            <div class="prose max-w-none">
                {!! $article->content !!}
            </div>

            {{-- Footer --}}
            <div class="mt-8 pt-6 border-t border-gray-200">
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
                    <div class="text-sm text-gray-500">
                        Ditulis oleh: {{ $article->author->name }}
                    </div>
                    <div class="flex space-x-2">
                        <a href="{{ route('articles.edit', $article) }}"
                            class="inline-flex items-center px-3 py-1.5 text-xs font-medium rounded-md bg-indigo-600 text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                            Edit
                        </a>
                        <form action="{{ route('articles.destroy', $article) }}" method="POST"
                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus artikel ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="inline-flex items-center px-3 py-1.5 text-xs font-medium rounded-md bg-red-600 text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500">
                                Hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
