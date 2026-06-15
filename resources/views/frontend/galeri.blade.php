<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeri Karya - Lumière Studio</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />
</head>
<body class="bg-gray-50 text-gray-800 font-['Instrument_Sans']">

    <nav class="bg-white shadow-sm sticky top-0 z-50 border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <a href="/" class="text-2xl font-bold text-indigo-600 tracking-tight">Lumière Studio</a>
                <div class="hidden md:flex space-x-8">
                    <a href="/" class="text-gray-600 hover:text-indigo-600 font-medium transition">Home</a>
                    <a href="/paket" class="text-gray-600 hover:text-indigo-600 font-medium transition">Paket Foto</a>
                    <a href="/galeri" class="text-indigo-600 font-semibold">Galeri</a>
                </div>
                <a href="/booking" class="bg-indigo-600 text-white px-4 py-2 rounded-lg font-medium hover:bg-indigo-700 transition shadow-sm">Book Now</a>
            </div>
        </div>
    </nav>

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <h1 class="text-3xl font-bold text-center mb-12 text-gray-900">Galeri Portofolio Kami</h1>
        <div class="columns-1 sm:columns-2 md:columns-3 gap-6 space-y-6">
            @forelse($galeris as $galeri)
                <div class="break-inside-avoid bg-white rounded-2xl overflow-hidden border border-gray-100 shadow-sm hover:shadow-md transition group">
                    <div class="relative overflow-hidden bg-gray-100">
                        @if($galeri->foto)
                            <img src="{{ asset('storage/' . $galeri->foto) }}" alt="{{ $galeri->judul }}" class="w-full object-cover">
                        @else
                            <div class="h-48 flex items-center justify-center text-gray-400 text-sm">No Image</div>
                        @endif
                    </div>
                    <div class="p-4">
                        <span class="text-xs font-semibold uppercase tracking-wider text-indigo-600 bg-indigo-50 px-2 py-0.5 rounded-md">{{ $galeri->kategori }}</span>
                        <h3 class="text-base font-bold text-gray-900 mt-2 mb-1">{{ $galeri->judul }}</h3>
                        @if($galeri->fotografer)
                            <p class="text-xs text-gray-500">Oleh: {{ $galeri->fotografer->nama_fotografer }}</p>
                        @endif
                    </div>
                </div>
            @empty
                <div class="w-full text-center py-12 bg-white rounded-2xl border border-dashed border-gray-200">
                    <p class="text-gray-400">Belum ada foto portofolio di galeri.</p>
                </div>
            @endforelse
        </div>
    </main>
</body>
</html>
