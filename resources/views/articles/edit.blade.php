@extends('layouts.app')

@section('title', 'Edit Artikel')
@section('header', 'Edit Artikel')

@section('content')
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        @if ($errors->any())
            <div class="bg-red-50 border-l-4 border-red-400 p-4 mb-6">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-red-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <h3 class="text-sm font-medium text-red-800">Terdapat {{ $errors->count() }} kesalahan dalam
                            pengisian form:</h3>
                        <div class="mt-2 text-sm text-red-700">
                            <ul class="list-disc pl-5 space-y-1">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <div class="px-4 py-5 sm:p-6">
            <form action="{{ route('articles.update', $article) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="space-y-6">
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Judul Artikel</label>
                        <input type="text" name="title" id="title" required
                            value="{{ old('title', $article->title) }}"
                            class="block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm py-2 px-3 border">
                    </div>

                    <div>
                        <label for="category_id" class="block text-sm font-medium text-gray-700 mb-1">Kategori</label>
                        <select id="category_id" name="category_id" required
                            class="block w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm py-2 px-3 border">
                            <option value="">Pilih Kategori</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ $article->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="editor" class="block text-sm font-medium text-gray-700 mb-1">Konten</label>
                        <textarea id="editor" name="content" rows="10" required class="hidden">{{ old('content', $article->content) }}</textarea>
                        <div id="editor-container" class="ckeditor-container border rounded-md shadow-sm"></div>
                    </div>

                    <div>
                        <label for="image" class="block text-sm font-medium text-gray-700 mb-1">Gambar Utama
                            (Opsional)</label>
                        @if ($article->image)
                            <div class="mb-2">
                                <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}"
                                    class="h-32 rounded-md object-cover">
                                <p class="mt-1 text-xs text-gray-500">Gambar saat ini</p>
                            </div>
                        @endif
                        <input type="file" name="image" id="image"
                            class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                    </div>

                    <div class="flex items-center">
                        <input type="hidden" name="published" value="0">
                        <input id="published" name="published" type="checkbox" value="1"
                            {{ $article->published ? 'checked' : '' }}
                            class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                        <label for="published" class="ml-2 block text-sm text-gray-900">
                            Publikasikan artikel ini
                        </label>
                    </div>

                    <div class="flex justify-end space-x-3 pt-4">
                        <a href="{{ route('articles.index') }}"
                            class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Batal
                        </a>
                        <button type="submit"
                            class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Update Artikel
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                ClassicEditor
                    .create(document.querySelector('#editor-container'), {
                        toolbar: {
                            items: [
                                'heading', '|',
                                'bold', 'italic', 'underline', 'strikethrough', 'subscript', 'superscript', '|',
                                'alignment', '|',
                                'numberedList', 'bulletedList', '|',
                                'outdent', 'indent', '|',
                                'link', 'blockQuote', 'imageUpload', 'insertTable', 'mediaEmbed', '|',
                                'undo', 'redo', '|',
                                'codeBlock', 'htmlEmbed', '|',
                                'sourceEditing'
                            ],
                            shouldNotGroupWhenFull: true
                        },
                        heading: {
                            options: [{
                                    model: 'paragraph',
                                    title: 'Paragraph',
                                    class: 'ck-heading_paragraph'
                                },
                                {
                                    model: 'heading1',
                                    view: 'h1',
                                    title: 'Heading 1',
                                    class: 'ck-heading_heading1'
                                },
                                {
                                    model: 'heading2',
                                    view: 'h2',
                                    title: 'Heading 2',
                                    class: 'ck-heading_heading2'
                                },
                                {
                                    model: 'heading3',
                                    view: 'h3',
                                    title: 'Heading 3',
                                    class: 'ck-heading_heading3'
                                },
                                {
                                    model: 'heading4',
                                    view: 'h4',
                                    title: 'Heading 4',
                                    class: 'ck-heading_heading4'
                                }
                            ]
                        },
                        placeholder: 'Tulis konten artikel di sini...',
                        simpleUpload: {
                            // The URL that the images are uploaded to.
                            uploadUrl: "{{ route('ckeditor.upload') }}",

                            // Enable the XMLHttpRequest.withCredentials property.
                            withCredentials: true,

                            // Headers sent along with the XMLHttpRequest to the upload server.
                            headers: {
                                'X-CSRF-TOKEN': "{{ csrf_token() }}"
                            }
                        }
                    })
                    .then(editor => {
                        // Update textarea when editor content changes
                        editor.model.document.on('change:data', () => {
                            document.getElementById('editor').value = editor.getData();
                        });

                        // Set initial data from the textarea
                        const initialData = document.getElementById('editor').value;
                        if (initialData) {
                            editor.setData(initialData);
                        }

                        window.editor = editor;
                    })
                    .catch(error => {
                        console.error(error);
                    });
            });
        </script>
    @endpush
@endsection
