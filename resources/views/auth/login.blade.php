<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | Lumière Studio</title>
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-[#FAFAF9] text-neutral-800 antialiased font-['Instrument_Sans']">

    <div class="min-h-screen flex flex-col sm:flex-row">
        <div class="hidden sm:flex sm:w-1/2 bg-neutral-950 p-12 flex-col justify-between">
            <div>
                <a href="/" class="text-white font-serif italic text-2xl tracking-wide">Lumière</a>
            </div>
            <div class="text-white space-y-4">
                <h2 class="text-4xl font-light leading-tight">Abadikan setiap <br> <span class="font-serif italic text-amber-500">momen berharga.</span></h2>
                <p class="text-neutral-500 text-sm">Masuk kembali ke akun Anda untuk melihat reservasi dan mengelola sesi pemotretan Anda.</p>
            </div>
        </div>

        <div class="flex-1 flex items-center justify-center p-8 bg-[#FAFAF9]">
            <div class="w-full max-w-sm">
                <h1 class="text-2xl font-medium text-neutral-950 mb-8">Selamat Datang Kembali</h1>
                
                @if (session('status'))
                    <div class="mb-4 text-sm text-green-600">{{ session('status') }}</div>
                @endif

                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf

                    <div>
                        <input id="email" class="w-full bg-white border border-neutral-200 p-3 text-sm rounded-none focus:border-amber-600 focus:ring-0 outline-none transition" type="email" name="email" value="{{ old('email') }}" placeholder="Email Address" required autofocus>
                        @error('email') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <input id="password" class="w-full bg-white border border-neutral-200 p-3 text-sm rounded-none focus:border-amber-600 focus:ring-0 outline-none transition" type="password" name="password" placeholder="Password" required>
                        @error('password') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div class="flex items-center justify-between">
                        <label class="inline-flex items-center text-xs text-neutral-500">
                            <input type="checkbox" class="border-neutral-300 text-amber-600 focus:ring-amber-500" name="remember">
                            <span class="ms-2">Remember me</span>
                        </label>

                        @if (Route::has('password.request'))
                            <a class="text-xs text-neutral-500 hover:text-amber-600 transition" href="{{ route('password.request') }}">Lupa Password?</a>
                        @endif
                    </div>

                    <button type="submit" class="w-full bg-neutral-950 text-white py-3 text-xs font-bold tracking-widest uppercase hover:bg-amber-600 transition-all duration-300">
                        Log In
                    </button>
                </form>

                <p class="mt-8 text-xs text-neutral-500 text-center">
                    Belum punya akun? <a href="{{ route('register') }}" class="text-amber-600 hover:underline">Daftar sekarang</a>
                </p>
            </div>
        </div>
    </div>

</body>
</html>