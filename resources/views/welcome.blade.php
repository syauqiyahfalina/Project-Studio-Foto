<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lumière Studio</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />

    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gray-50 text-gray-800 antialiased font-['Instrument_Sans']">

    <nav class="bg-white shadow-sm sticky top-0 z-50 border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <a href="/" class="text-2xl font-bold text-indigo-600 tracking-tight">Lumière Studio</a>
                
                <div class="hidden md:flex space-x-8">
                    <a href="/" class="text-indigo-600 font-semibold">Dashboard</a>
                    <a href="/paket" class="text-gray-600 hover:text-indigo-600 font-medium transition">Paket Foto</a>
                    <a href="/galeri" class="text-gray-600 hover:text-indigo-600 font-medium transition">Galeri</a>
                </div>

                <div class="flex items-center space-x-4">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="text-sm font-medium text-gray-700 hover:text-indigo-600 transition">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="text-sm font-medium text-gray-700 hover:text-indigo-600 transition">Log in</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="text-sm font-medium bg-gray-100 hover:bg-gray-200 text-gray-800 px-3 py-1.5 rounded-lg transition">Register</a>
                            @endif
                        @endauth
                    @endif
                    <a href="/booking" class="bg-indigo-600 text-white px-4 py-2 rounded-lg font-medium hover:bg-indigo-700 transition shadow-sm">Book Now</a>
                </div>
            </div>
        </div>
    </nav>

    <header class="bg-gradient-to-r from-indigo-900 to-slate-900 text-white py-24 px-4 text-center">
        <div class="max-w-3xl mx-auto">
            <span class="bg-indigo-500/20 text-indigo-300 text-xs font-semibold px-3 py-1 rounded-full uppercase tracking-wider">Premium Photography</span>
            <h1 class="text-4xl md:text-6xl font-extrabold mt-4 mb-6 leading-tight">Abadikan Setiap Momen Berharga Anda</h1>
            <p class="text-lg text-indigo-200/90 mb-8 max-w-2xl mx-auto">Studio foto profesional dengan peralatan mutakhir, latar estetik, dan fotografer ahli.</p>
            <a href="/booking" class="bg-white text-indigo-950 font-bold px-8 py-3.5 rounded-full hover:bg-gray-100 transition shadow-lg inline-block">Mulai Reservasi Sekarang</a>
        </div>
    </header>

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900">Pilihan Ruang Studio</h2>
            <p class="text-gray-500 mt-2 max-w-lg mx-auto">Temukan atmosfer dan tema studio yang paling cocok dengan konsep foto Anda.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @forelse($studios as $studio)
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-xl transition duration-300 group">
                    <div class="relative overflow-hidden bg-gray-100 h-60">
                        @if($studio->foto)
                            <img src="{{ asset('storage/' . $studio->foto) }}" alt="{{ $studio->nama_studio }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                        @else
                            <div class="w-full h-full flex items-center justify-center text-gray-400">No Image Available</div>
                        @endif
                    </div>
                    <div class="p-6">
                        <div class="flex justify-between items-center mb-3">
                            <h3 class="text-xl font-bold text-gray-900">{{ $studio->nama_studio }}</h3>
                            <span class="text-xs font-semibold px-2.5 py-1 rounded-full {{ $studio->status == 'aktif' ? 'bg-green-50 text-green-700 border border-green-200' : 'bg-red-50 text-red-700 border border-red-200' }} capitalize">
                                {{ $studio->status }}
                            </span>
                        </div>
                        <p class="text-sm text-gray-500 font-medium mb-4 flex items-center">
                            Kapasitas: {{ $studio->kapasitas }} Orang
                        </p>
                        <p class="text-gray-600 text-sm leading-relaxed line-clamp-3">{{ $studio->deskripsi }}</p>
                    </div>
                </div>
            @empty
                <div class="col-span-3 text-center py-12 bg-white rounded-2xl border border-dashed border-gray-200">
                    <p class="text-gray-400">Belum ada data studio foto yang aktif.</p>
                </div>
            @endforelse
        </div>
    </main>

    <footer class="bg-gray-900 text-gray-400 py-8 border-t border-gray-800 text-center text-sm">
        <p>&copy; {{ date('Y') }} Lumière Studio. All rights reserved.</p>
    </footer>

</body>
</html>