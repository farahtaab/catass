<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeria de Gats ✨🐾</title>
    @vite('resources/css/app.css')
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #fafafa;
            color: #333;
        }
    </style>
</head>
<body class="flex flex-col min-h-screen">
    <!-- Navbar -->
    <nav class="bg-white/80 backdrop-blur-md shadow-md py-4 text-center font-semibold text-lg text-gray-700">
        🐾 Galeria de Gats ✨
    </nav>

    <!-- Contenido -->
    <main class="container mx-auto px-6 py-12 flex-grow">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($cats as $cat)
                <div class="bg-white rounded-xl shadow-lg overflow-hidden transform transition duration-300 hover:-translate-y-2 hover:shadow-xl">
                    <img src="https://cataas.com/cat/{{ $cat->_id }}" alt="Cat" class="w-full h-60 object-cover">
                    <div class="p-4 text-center">
                        <p class="text-gray-500 text-sm">
                            <strong>Tags:</strong> {{ is_array($cat->tags) ? implode(', ', $cat->tags) : 'Sense tags' }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Paginación -->
        <div class="flex justify-center items-center space-x-4 mt-12">
            @if ($cats->onFirstPage())
                <span class="px-4 py-2 bg-gray-300 text-gray-600 rounded-lg cursor-not-allowed">← Anterior</span>
            @else
                <a href="{{ $cats->previousPageUrl() }}" class="px-4 py-2 bg-white text-gray-800 border border-gray-300 rounded-lg hover:bg-gray-200">← Anterior</a>
            @endif

            <span class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg">{{ $cats->currentPage() }} / {{ $cats->lastPage() }}</span>

            @if ($cats->hasMorePages())
                <a href="{{ $cats->nextPageUrl() }}" class="px-4 py-2 bg-white text-gray-800 border border-gray-300 rounded-lg hover:bg-gray-200">Següent →</a>
            @else
                <span class="px-4 py-2 bg-gray-300 text-gray-600 rounded-lg cursor-not-allowed">Següent →</span>
            @endif
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-white text-gray-600 text-center py-4 shadow-inner text-sm">
        Fet amb 💕 per una amant dels gats 🐾 | Laravel + TailwindCSS
    </footer>
</body>
</html>