<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reservation — Lumière Studio</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-[#FAFAF9] text-neutral-800 antialiased font-['Instrument_Sans']">

    <nav class="bg-[#FAFAF9]/90 backdrop-blur-md sticky top-0 z-50 border-b border-amber-500/10 shadow-2xs">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20 items-center">
                
                <a href="/" class="flex items-center space-x-3.5 group">
                    <div class="relative flex items-center justify-center w-10 h-10 text-amber-600 transition-all duration-500 group-hover:rotate-45">
                        <svg class="w-9 h-9 drop-shadow-[0_1px_3px_rgba(217,119,6,0.15)]" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 2C13.5 4.5 13.5 7.5 12 9.5L9.5 7C10.5 5 11 3.5 12 2Z" fill="currentColor" opacity="0.9"/>
                            <path d="M22 12C19.5 13.5 16.5 13.5 14.5 12L17 9.5C19 10.5 20.5 11 22 12Z" fill="currentColor" opacity="0.75"/>
                            <path d="M12 22C10.5 19.5 10.5 16.5 12 14.5L14.5 17C13.5 19 13.0 20.5 12 22Z" fill="currentColor" opacity="0.9"/>
                            <path d="M2 12C4.5 10.5 7.5 10.5 9.5 12L7 14.5C5 13.5 3.5 13 2 12Z" fill="currentColor" opacity="0.75"/>
                            <circle cx="12" cy="12" r="1.5" fill="#FAFAF9"/>
                            <circle cx="12" cy="12" r="0.75" fill="currentColor"/>
                        </svg>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-xl font-bold tracking-[0.25em] uppercase text-neutral-900 group-hover:text-amber-600 transition-colors duration-300 leading-none">Lumière</span>
                        <span class="text-[8px] font-bold tracking-[0.4em] uppercase text-amber-600 mt-2">Studio</span>
                    </div>
                </a>

                <div class="hidden md:flex space-x-10">
                    <a href="/" class="text-neutral-400 hover:text-neutral-950 font-medium tracking-wide transition duration-200">Home</a>
                    <a href="/paket" class="text-neutral-400 hover:text-neutral-950 font-medium tracking-wide transition duration-200">Paket Foto</a>
                    <a href="/galeri" class="text-neutral-400 hover:text-neutral-950 font-medium tracking-wide transition duration-200">Galeri</a>
                    <a href="/my-reservations" class="text-neutral-400 hover:text-neutral-950 font-medium tracking-wide transition duration-200">My Booking</a>
                </div>

                <div class="w-24"></div> </div>
        </div>
    </nav>

    <main class="max-w-2xl mx-auto px-4 py-20">
        <div class="mb-12 text-center">
            <span class="text-[9px] font-bold tracking-[0.5em] text-amber-600 uppercase block mb-4">// Booking Session</span>
            <h1 class="text-3xl md:text-5xl font-light text-neutral-950 tracking-tight">Formulir Reservasi</h1>
            <p class="text-neutral-400 font-light text-sm mt-3">Silakan tentukan jadwal sesi foto dan pilih ruang studio serta fotografer pilihan Anda.</p>
        </div>

        @if ($errors->any())
            <div class="mb-8 p-5 bg-red-50 border border-red-200 text-red-700 text-sm rounded-none">
                <ul class="list-disc pl-5 space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('booking.store') }}" method="POST" class="space-y-8 bg-white border border-neutral-200/40 p-8 md:p-10 shadow-2xl shadow-neutral-950/5">
            @csrf

            <div>
                <label class="block text-xs font-bold tracking-widest uppercase text-neutral-500 mb-3">Pilihan Paket Sesi</label>
                <select name="paket_id" required class="w-full px-4 py-3.5 bg-[#FAFAF9] border border-neutral-200 text-sm text-neutral-800 rounded-none focus:outline-none focus:border-amber-500 font-light transition">
                    <option value="" class="text-neutral-400">-- Pilih Paket Foto --</option>
                    @foreach($pakets as $paket)
                        <option value="{{ $paket->id }}" {{ request('paket') == $paket->id ? 'selected' : '' }}>
                            {{ $paket->nama_paket }} — (Rp {{ number_format($paket->harga, 0, ',', '.') }})
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-xs font-bold tracking-widest uppercase text-neutral-500 mb-3">Ruang Studio</label>
                <select name="studio_id" required class="w-full px-4 py-3.5 bg-[#FAFAF9] border border-neutral-200 text-sm text-neutral-800 rounded-none focus:outline-none focus:border-amber-500 font-light transition">
                    <option value="">-- Pilih Ruang Studio --</option>
                    @foreach($studios as $studio)
                        <option value="{{ $studio->id }}">
                            {{ $studio->nama_studio }} (Max: {{ $studio->kapasitas }} Orang)
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-xs font-bold tracking-widest uppercase text-neutral-500 mb-3">Fotografer Utama</label>
                <select name="fotografer_id" required class="w-full px-4 py-3.5 bg-[#FAFAF9] border border-neutral-200 text-sm text-neutral-800 rounded-none focus:outline-none focus:border-amber-500 font-light transition">
                    <option value="">-- Pilih Fotografer --</option>
                    @foreach($fotografers as $ftg)
                        <option value="{{ $ftg->id }}">
                            {{ $ftg->nama_fotografer }} — (Spesialis: {{ $ftg->spesialisasi }})
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-xs font-bold tracking-widest uppercase text-neutral-500 mb-3">Tanggal Pelaksanaan</label>
                <input type="date" name="tanggal_reservasi" required class="w-full px-4 py-3.5 bg-[#FAFAF9] border border-neutral-200 text-sm text-neutral-800 rounded-none focus:outline-none focus:border-amber-500 font-light transition">
            </div>

            <div class="grid grid-cols-2 gap-6">
                <div>
                    <label class="block text-xs font-bold tracking-widest uppercase text-neutral-500 mb-3">Waktu Mulai</label>
                    <input type="time" name="jam_mulai" required class="w-full px-4 py-3.5 bg-[#FAFAF9] border border-neutral-200 text-sm text-neutral-800 rounded-none focus:outline-none focus:border-amber-500 font-light transition">
                </div>
                <div>
                    <label class="block text-xs font-bold tracking-widest uppercase text-neutral-500 mb-3">Waktu Selesai</label>
                    <input type="time" name="jam_selesai" required class="w-full px-4 py-3.5 bg-[#FAFAF9] border border-neutral-200 text-sm text-neutral-800 rounded-none focus:outline-none focus:border-amber-500 font-light transition">
                </div>
            </div>

            <div class="pt-4 flex space-x-4">
                <a href="/" class="w-1/3 text-center border border-neutral-200 text-neutral-500 py-4 text-xs font-bold tracking-widest uppercase rounded-none hover:bg-neutral-50 transition duration-300">
                    Cancel
                </a>
                <button type="submit" class="w-2/3 bg-neutral-950 text-[#FAFAF9] hover:bg-amber-600 hover:text-neutral-950 py-4 text-xs font-bold tracking-widest uppercase rounded-none transition-all duration-300 shadow-xs">
                    Confirm Booking
                </button>
            </div>
        </form>
    </main>

    <footer class="bg-neutral-950 text-neutral-400 pt-16 pb-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-white font-serif italic text-2xl tracking-wide mb-3">Lumière</h2>
            <p class="text-neutral-500 text-xs tracking-wider mb-8">Capturing light, preserving memories.</p>
            <div class="w-12 h-[1px] bg-amber-500/30 mx-auto mb-8"></div>
            <p class="text-neutral-600 text-[11px] tracking-widest uppercase">&copy; {{ date('Y') }} Lumière Studio. All rights reserved.</p>
        </div>
    </footer>

</body>
</html>