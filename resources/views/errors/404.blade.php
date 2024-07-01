<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Not Found</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="bg-white shadow-md rounded-lg p-8 max-w-md text-center">
        <h1 class="text-6xl font-bold text-gray-600">404</h1>
        <h2 class="text-2xl mt-4 mb-2">Page Not Found</h2>
        <p class="text-gray-600 mb-6">Maaf, Halaman ini kosong tekan Go Home untuk kembali.</p>
        <a href="{{ url('/') }}" class="px-4 py-2 bg-gray-800 text-white rounded hover:bg-gray-300">Go Home</a>
    </div>
</body>
</html>
