<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Reservations — Lumière Studio</title>
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
                    <a href="/my-reservations" class="text-neutral-950 font-medium tracking-wide relative after:absolute after:bottom-[-4px] after:left-0 after:w-full after:h-[1px] after:bg-amber-500">My Booking</a>
                </div>

                <div>
                    <a href="/booking" class="bg-neutral-950 text-[#FAFAF9] hover:bg-amber-600 hover:text-neutral-950 text-xs font-bold tracking-widest uppercase px-6 py-3 transition-all duration-300">
                        Book Session
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <main class="max-w-5xl mx-auto px-4 py-20">
        <div class="mb-12 flex flex-col md:flex-row md:items-end justify-between border-b border-neutral-200/60 pb-6">
            <div>
                <span class="text-[9px] font-bold tracking-[0.4em] text-amber-600 uppercase block mb-3">// Dashboard</span>
                <h1 class="text-3xl md:text-4xl font-light text-neutral-950 tracking-tight">Riwayat Reservasi</h1>
            </div>
            <p class="text-neutral-400 font-light text-sm mt-2 md:mt-0">Pantau status pemesanan jadwal studio foto Anda di sini.</p>
        </div>

        @if(session('success'))
            <div class="mb-8 p-4 bg-amber-50 border border-amber-500/20 text-amber-800 text-sm font-light">
                {{ session('success') }}
            </div>
        @endif

        <div class="space-y-6">
            @forelse($reservasis as $reservasi)
                <div class="bg-white border border-neutral-200/40 p-6 md:p-8 flex flex-col md:flex-row md:items-center justify-between shadow-xs hover:border-amber-500/20 transition-all duration-300">
                    
                    <div class="space-y-3">
                        <div class="flex items-center space-x-3">
                            <span class="text-xs font-bold tracking-wider uppercase text-neutral-900">
                                Booking Code: #{{ $reservasi->id }}
                            </span>
                            <span class="text-[9px] font-bold tracking-widest uppercase px-2 py-0.5 border capitalize
                                {{ $reservasi->status == 'Pending' ? 'bg-amber-50 border-amber-500/20 text-amber-700' : '' }}
                                {{ $reservasi->status == 'dikonfirmasi' || $reservasi->status == 'Success' ? 'bg-green-50 border-green-500/20 text-green-700' : '' }}
                                {{ $reservasi->status == 'dibatalkan' ? 'bg-red-50 border-red-500/20 text-red-700' : '' }}
                            ">
                                {{ $reservasi->status }}
                            </span>
                        </div>
                        
                        <h2 class="text-xl font-medium tracking-tight text-neutral-950">
                            {{ $reservasi->paket->nama_paket ?? 'Paket Sesi Foto' }}
                        </h2>
                        
                        <div class="flex flex-wrap gap-x-6 gap-y-1 text-sm text-neutral-400 font-light">
                            <span class="flex items-center">
                                Studio: {{ $reservasi->studio->nama_studio ?? '-' }}
                            </span>
                            <span class="flex items-center">
                                Tanggal: {{ \Carbon\Carbon::parse($reservasi->tanggal_reservasi)->format('d M Y') }}
                            </span>
                            <span class="flex items-center">
                                Jam: {{ substr($reservasi->jam_mulai, 0, 5) }} - {{ substr($reservasi->jam_selesai, 0, 5) }} WIB
                            </span>
                        </div>
                    </div>

                    <div class="mt-6 md:mt-0 text-left md:text-right flex flex-row md:flex-col items-center md:items-end justify-between md:justify-center gap-4 border-t md:border-t-0 border-neutral-100 pt-4 md:pt-0">
                        <div>
                            <span class="block text-[10px] font-bold tracking-wider text-neutral-400 uppercase">Total Tagihan</span>
                            <span class="text-xl font-bold text-amber-600">
                                Rp {{ number_format($reservasi->total_harga, 0, ',', '.') }}
                            </span>
                        </div>

                        @if($reservasi->status == 'Pending')
                            <a href="/my-reservations/{{ $reservasi->id }}" class="bg-neutral-950 text-[#FAFAF9] hover:bg-amber-600 hover:text-neutral-950 text-[10px] font-bold tracking-widest uppercase px-4 py-2.5 transition-all duration-300">
                                Bayar Sekarang
                            </a>
                        @else
                            <a href="/my-reservations/{{ $reservasi->id }}" class="border border-neutral-200 text-neutral-400 hover:text-neutral-950 hover:border-neutral-950 text-[10px] font-bold tracking-widest uppercase px-4 py-2.5 transition-all duration-300">
                                View Detail
                            </a>
                        @endif
                    </div>

                </div>
            @empty
                <div class="text-center py-20 bg-white border border-neutral-200/30">
                    <p class="text-neutral-400 font-light text-sm tracking-wide mb-4">Anda belum memiliki riwayat reservasi jadwal sesi foto.</p>
                    <a href="/booking" class="text-xs font-bold text-amber-600 tracking-widest uppercase hover:underline">Mulai Booking Sekarang &rarr;</a>
                </div>
            @endforelse
        </div>
    </main>

    <footer class="bg-neutral-950 text-neutral-400 pt-16 pb-12 mt-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-white font-serif italic text-2xl tracking-wide mb-3">Lumière</h2>
            <p class="text-neutral-500 text-xs tracking-wider mb-8">Capturing light, preserving memories.</p>
            <div class="w-12 h-[1px] bg-amber-500/30 mx-auto mb-8"></div>
            <p class="text-neutral-600 text-[11px] tracking-widest uppercase">&copy; {{ date('Y') }} Lumière Studio. All rights reserved.</p>
        </div>
    </footer>

</body>
</html>