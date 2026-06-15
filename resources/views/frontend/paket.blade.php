<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Paket Foto - Lumière Studio</title>
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
                    <a href="/paket" class="text-indigo-600 font-semibold">Paket Foto</a>
                    <a href="/galeri" class="text-gray-600 hover:text-indigo-600 font-medium transition">Galeri</a>
                </div>
                <a href="/booking" class="bg-indigo-600 text-white px-4 py-2 rounded-lg font-medium hover:bg-indigo-700 transition shadow-sm">Book Now</a>
            </div>
        </div>
    </nav>

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <h1 class="text-3xl font-bold text-center mb-12 text-gray-900">Pilihan Paket Foto</h1>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @forelse($pakets as $paket)
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-lg transition flex flex-col justify-between">
                    <div>
                        <div class="bg-gray-100 h-48 w-full overflow-hidden">
                            @if($paket->foto)
                                <img src="{{ asset('storage/' . $paket->foto) }}" alt="{{ $paket->nama_paket }}" class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-gray-400 text-sm">No Image</div>
                            @endif
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $paket->nama_paket }}</h3>
                            <div class="text-2xl font-extrabold text-indigo-600 mb-4">Rp {{ number_format($paket->harga, 0, ',', '.') }}</div>
                            <p class="text-sm text-gray-500 mb-4">Durasi: {{ $paket->durasi }} Menit</p>
                            <p class="text-gray-600 text-sm leading-relaxed">{{ $paket->deskripsi }}</p>
                        </div>
                    </div>
                    <div class="p-6 pt-0">
                        <a href="/booking?paket={{ $paket->id }}" class="block w-full text-center bg-indigo-50 hover:bg-indigo-100 text-indigo-700 font-semibold py-2.5 rounded-xl transition">Pilih Paket Ini</a>
                    </div>
                </div>
            @empty
                <div class="col-span-3 text-center py-12 bg-white rounded-2xl border border-dashed border-gray-200">
                    <p class="text-gray-400">Belum ada data paket foto yang tersedia.</p>
                </div>
            @endforelse
        </div>
    </main>
</body>
</html>
