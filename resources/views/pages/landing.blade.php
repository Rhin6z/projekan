<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Document</title>
</head>
<body class="mx-auto">
    <header class="px-50 w-full bg-orange-100 fixed ">
        <div class="p-4 flex items-center justify-between mx-auto">
            <h1 class="text-black font-bold text-2xl"><span class="text-orange-400">PKL</span>Stembayo<span class="text-orange-400">.</span></h1>
            @if (Route::has('login'))
                <nav class="flex items-center justify-end gap-4">
                    @auth
                        <a
                            href="{{ url('/dashboard') }}"
                            class="bg-orange-200 p-2 rounded-md text-sm h duration-500 border-violet-600/30 text-black font-semibold hover:bg-transparent hover:text-black"
                        >
                            Dashboard
                        </a>
                    @else
                        <a
                            href="{{ route('login') }}"
                            class="text-black font-semibold text-sm border border-orange-300/30 rounded-md px-4 py-2 hover:bg-transparent duration-500 transition hover:text-orange-300"
                        >
                            Log in
                        </a>

                        @if (Route::has('register'))
                            <a
                                href="{{ route('register') }}"
                                class="bg-orange-400 hover:bg-black p-2 rounded-md text-sm h duration-500  text-black font-semibold  hover:text-orange-400">
                                Register
                            </a>
                        @endif
                    @endauth
                </nav>
            @endif
        </div>
    </header>
    <main class="bg-orange-100  w-full h-screen grid grid-cols-2 px-50 items-center">
        <div class="">
            <div class="text-6xl font-bold  ">
                <h1 class="">Selamat Datang</h1>
                <h1>Di<span class="text-orange-400"> PKL </span>Stembayo</h1>
            </div>
            <div class="pt-5 w-1/2">
                <p class="font-medium text-slate-900">
                    Platform ini dibuat untuk membantu siswa PKL, Silahkan Bergabung untuk melanjutkan.
                </p>
            </div>
            <div class="pt-5 text-white font-medium">
                <a href="{{ route('register') }}" class="bg-orange-400 text-white px-4 py-2 rounded-xl hover:bg-orange-500 transition duration-300 inline-flex items-center gap-2">
                    Bergabung
                    <x-heroicon-o-arrow-up-right class="w-5 h-5 font-medium" />
                </a>
            </div>

        </div>

        <div class="w-1/2 mx-auto absolute right-10">
    <!-- Gambar utama -->
            <img src="http://localhost:8000/wanita.png" alt="Deskripsi Gambar" class="w-full h-auto z-0 relative">

            <!-- Overlay blur di atas gambar -->
            <div class="absolute inset-x-0 bottom-0 h-20 bg-gradient-to-t from-orange-100 to-transparent z-10 rounded-md"></div>

        </div>

    </main>
</body>
</html>
