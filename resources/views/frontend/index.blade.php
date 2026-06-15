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
                    <a href="/" class="text-neutral-950 font-medium tracking-wide relative after:absolute after:bottom-[-4px] after:left-0 after:w-full after:h-[1px] after:bg-amber-500">Home</a>
                    <a href="/paket" class="text-neutral-400 hover:text-neutral-950 font-medium tracking-wide transition duration-200">Paket Foto</a>
                    <a href="/galeri" class="text-neutral-400 hover:text-neutral-950 font-medium tracking-wide transition duration-200">Galeri</a>
                    <a href="/my-reservations" class="text-neutral-400 hover:text-neutral-950 font-medium tracking-wide transition duration-200">My Booking</a>
                </div>

                <div class="flex items-center space-x-6">
                    @if (Route::has('login'))
                        @auth
                            <a href="/my-reservations" class="text-xs font-semibold tracking-widest uppercase text-neutral-600 hover:text-neutral-950 transition">My Booking</a>
                        @else
                            <a href="{{ route('login') }}" class="text-xs font-semibold tracking-widest uppercase text-neutral-600 hover:text-neutral-950 transition">Log In</a>
                        @endauth
                    @endif
                    <a href="/booking" class="bg-neutral-950 text-[#FAFAF9] hover:bg-amber-600 hover:text-neutral-950 text-xs font-bold tracking-widest uppercase px-6 py-3 transition-all duration-300">
                        Book Session
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <header class="relative overflow-hidden bg-[#FAFAF9] pt-28 pb-24 px-4 border-b border-neutral-200/40">
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] bg-amber-100/30 rounded-full blur-3xl pointer-events-none animate-pulse"></div>
        <div class="max-w-4xl mx-auto text-center relative z-10">
            <span class="text-[9px] font-bold tracking-[0.5em] text-amber-600 uppercase block mb-6">// Premium Photography Studio</span>
            <h1 class="text-4xl md:text-7xl font-light text-neutral-950 leading-[1.12] tracking-tight mb-8">
                Abadikan Sisi Terbaik <br>
                <span class="font-serif italic font-normal text-amber-600">Dalam Pendaran Cahaya</span>
            </h1>
            <p class="text-base md:text-lg text-neutral-500 mb-12 max-w-2xl mx-auto leading-relaxed font-light">
                Kombinasi presisi seni tata pencahayaan modern, ruang dekorasi estetik kelas dunia, dan arahan fotografer profesional untuk mahakarya visual Anda.
            </p>
            <a href="/booking" class="bg-transparent border border-neutral-950 text-neutral-950 hover:bg-neutral-950 hover:text-white text-xs font-bold tracking-widest uppercase px-12 py-4.5 transition-all duration-300 inline-block">
                Explore Packages
            </a>
        </div>
    </header>

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
        <div class="flex flex-col md:flex-row md:items-end justify-between mb-16 border-b border-neutral-200/60 pb-8">
            <div class="max-w-lg">
                <span class="text-xs font-bold text-amber-600 tracking-widest uppercase mb-2 block">Our Spaces</span>
                <h2 class="text-3xl md:text-4xl font-light tracking-tight text-neutral-950">Pilihan Ruang Studio</h2>
            </div>
            <p class="text-neutral-400 text-sm max-w-sm mt-4 md:mt-0 font-light leading-relaxed">Each studio space is artistically curated to bring your concepts to life.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
            @forelse($studios as $studio)
                <div class="bg-white border border-neutral-200/30 overflow-hidden transition-all duration-500 hover:border-amber-500/30 hover:shadow-2xl hover:shadow-neutral-950/5 group flex flex-col justify-between">
                    <div class="relative overflow-hidden bg-neutral-100 aspect-4/3">
                        @if($studio->foto)
                            <img src="{{ asset('storage/' . $studio->foto) }}" alt="{{ $studio->nama_studio }}" class="w-full h-full object-cover group-hover:scale-102 transition duration-700 ease-out">
                        @else
                            <div class="w-full h-full flex items-center justify-center text-neutral-400 text-xs font-light tracking-widest uppercase">No Image</div>
                        @endif
                    </div>
                    <div class="p-8">
                        <div class="flex justify-between items-baseline mb-4">
                            <h3 class="text-xl font-medium tracking-tight text-neutral-900">{{ $studio->nama_studio }}</h3>
                            <span class="text-[9px] font-bold tracking-widest uppercase px-2.5 py-1 bg-amber-50/60 border border-amber-500/20 text-amber-700 capitalize">{{ $studio->status }}</span>
                        </div>
                        <p class="text-xs text-neutral-400 font-medium tracking-wider mb-4 flex items-center uppercase">Max Kapasitas: {{ $studio->kapasitas }} Orang</p>
                        <p class="text-neutral-400 text-sm font-light leading-relaxed line-clamp-3">{{ $studio->deskripsi }}</p>
                    </div>
                </div>
            @empty
                <div class="col-span-3 text-center py-16 bg-white border border-dashed border-neutral-200">
                    <p class="text-neutral-400 font-light text-sm tracking-wide">Belum ada data studio foto yang aktif saat ini.</p>
                </div>
            @endforelse
        </div>
    </main>

    <footer class="bg-neutral-950 text-neutral-400 pt-16 pb-12">
        <div class="max-w-7xl mx-auto text-center px-4">
            <h2 class="text-white font-serif italic text-2xl tracking-wide mb-3">Lumière</h2>
            <p class="text-neutral-600 text-[11px] tracking-widest uppercase">&copy; {{ date('Y') }} Lumière Studio. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>