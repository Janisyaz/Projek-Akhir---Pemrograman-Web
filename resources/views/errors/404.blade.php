<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Halaman Tidak Ditemukan</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="text-center px-6">
        <h1 class="text-6xl font-bold text-indigo-600 mb-4">404</h1>
        <h2 class="text-2xl font-semibold text-gray-800 mb-2">Oops! Halaman tidak ditemukan</h2>
        <p class="text-gray-600 mb-6">Maaf, halaman yang kamu cari tidak tersedia atau sudah dipindahkan.</p>
        <a href="{{ route('home') }}"
            class="inline-block bg-indigo-600 hover:bg-indigo-700 text-white font-semibold px-6 py-3 rounded-md shadow">
            Kembali ke Beranda
        </a>
    </div>
</body>

</html>
