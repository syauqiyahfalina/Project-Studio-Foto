<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Booking Detail #{{ $reservasi->id }} — Lumière</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-[#FAFAF9] text-neutral-800 antialiased font-['Instrument_Sans']">

    <nav class="bg-[#FAFAF9]/90 backdrop-blur-md sticky top-0 z-50 border-b border-amber-500/10 shadow-2xs">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20 items-center">
                <a href="/" class="flex items-center space-x-3.5 group">
                    <div class="relative flex items-center justify-center w-10 h-10 text-amber-600">
                        <svg class="w-9 h-9" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 2C13.5 4.5 13.5 7.5 12 9.5L9.5 7C10.5 5 11 3.5 12 2Z" fill="currentColor" opacity="0.9"/>
                            <path d="M22 12C19.5 13.5 16.5 13.5 14.5 12L17 9.5C19 10.5 20.5 11 22 12Z" fill="currentColor" opacity="0.75"/>
                            <path d="M12 22C10.5 19.5 10.5 16.5 12 14.5L14.5 17C13.5 19 13.0 20.5 12 22Z" fill="currentColor" opacity="0.9"/>
                            <path d="M2 12C4.5 10.5 7.5 10.5 9.5 12L7 14.5C5 13.5 3.5 13 2 12Z" fill="currentColor" opacity="0.75"/>
                            <circle cx="12" cy="12" r="1.5" fill="#FAFAF9"/>
                            <circle cx="12" cy="12" r="0.75" fill="currentColor"/>
                        </svg>
                    </div>
                    <div class="flex flex-col">
                        <span class="text-xl font-bold tracking-[0.25em] uppercase text-neutral-900">Lumière</span>
                        <span class="text-[8px] font-bold tracking-[0.4em] uppercase text-amber-600 mt-2">Studio</span>
                    </div>
                </a>
                <div>
                    <a href="/my-reservations" class="border border-neutral-200 text-neutral-500 hover:text-neutral-950 text-xs font-bold tracking-widest uppercase px-5 py-2.5 transition">
                        Back to List
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <main class="max-w-3xl mx-auto px-4 py-16">
        <div class="bg-white border border-neutral-200/40 p-8 md:p-12 shadow-2xl shadow-neutral-950/5 space-y-8">
            
            <div class="border-b border-neutral-100 pb-6 flex justify-between items-center">
                <div>
                    <span class="text-[9px] font-bold tracking-[0.4em] text-amber-600 uppercase block mb-1">// Invoice Detail</span>
                    <h1 class="text-2xl font-light text-neutral-950">Reservation #{{ $reservasi->id }}</h1>
                </div>
                <span class="text-xs font-bold tracking-widest uppercase px-3 py-1 bg-amber-50 border border-amber-500/20 text-amber-700 capitalize">
                    {{ $reservasi->status }}
                </span>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-sm">
                <div>
                    <h3 class="text-xs font-bold tracking-wider text-neutral-400 uppercase mb-2">Paket & Studio</h3>
                    <p class="text-base font-medium text-neutral-900">{{ $reservasi->paket->nama_paket ?? 'Custom Session' }}</p>
                    <p class="text-neutral-500 font-light mt-1">Ruang: {{ $reservasi->studio->nama_studio ?? '-' }}</p>
                </div>
                <div>
                    <h3 class="text-xs font-bold tracking-wider text-neutral-400 uppercase mb-2">Jadwal Pelaksanaan</h3>
                    <p class="text-base font-medium text-neutral-900">{{ \Carbon\Carbon::parse($reservasi->tanggal_reservasi)->format('d F Y') }}</p>
                    <p class="text-neutral-500 font-light mt-1">Jam: {{ substr($reservasi->jam_mulai, 0, 5) }} - {{ substr($reservasi->jam_selesai, 0, 5) }} WIB</p>
                </div>
            </div>

            <div class="bg-[#FAFAF9] border border-neutral-100 p-6 flex justify-between items-center">
                <div>
                    <h3 class="text-xs font-bold tracking-wider text-neutral-400 uppercase mb-1">Total Tagihan</h3>
                    <p class="text-2xl font-bold text-amber-600">Rp {{ number_format($reservasi->total_harga, 0, ',', '.') }}</p>
                </div>
                
                @if($reservasi->status == 'Pending')
                    <div class="text-right text-xs text-neutral-400 font-light max-w-xs">
                        Silakan lakukan pembayaran ke rekening **BCA 1234-5678-90** a/n Lumière Studio dan konfirmasi ke admin.
                    </div>
                @endif
            </div>

        </div>
    </main>

</body>
</html>