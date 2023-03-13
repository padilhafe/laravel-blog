<!doctype html>

<title>Felipe Padilha - Blog</title>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

<style>
    html {
        scroll-behavior: smooth;
    }
    .clamp {
        display: -webkit-box;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    .clamp.one-line {
        -webkit-line-clamp: 1;
    }
</style>

<body style="font-family: Open Sans, sans-serif">
    <section class="px-6 py-8">
        <nav class="md:flex md:justify-between md:items-center">
            <div>
                <a href="/">
                    <img src="/images/logo.png" alt="Vitrion Blog" width="165" height="16">
                </a>
            </div>

            <div class="mt-8 md:mt-0 flex items-center">
                @guest
                    <a href="/register" class="text-xs font-bold uppercase">Registre-se</a>
                    <a href="/login" class="text-xs font-bold uppercase ml-3">Login</a>
                @endguest

                @auth
                    <span class="text-xs font-bold uppercase">Bem-vindo, {{ auth()->user()->name }} </span>

                    <form   method="POST" 
                            action="/logout"
                            class="text-xs font-semibold text-blue-500 ml-6"    
                        >
                        @csrf
                        <button type="submit">Logout</button>
                    </form>
                @endauth
                
                <a href="#newsletter" class="bg-black hover:bg-gray-700 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">
                    Inscreva-se para atualizações
                </a>
            </div>
        </nav>

        {{ $slot }}

        <footer id="newsletter" class="bg-gray-100 border border-black border-opacity-5 rounded-xl text-center py-16 px-10 mt-16">
            <img src="/images/lary-newsletter-icon.svg" alt="" class="mx-auto -mb-6" style="width: 145px;">
            <h5 class="text-3xl">Fique sabendo das novas publicações</h5>
            <p class="text-sm mt-3">Prometo deixar sua caixa de entrada limpa. Apenas informações úteis.</p>

            <div class="mt-10">
                <div class="relative inline-block mx-auto lg:bg-gray-200 rounded-full">

                    <form method="POST" action="/newsletter" class="lg:flex text-sm">
                        @csrf
                        <div class="lg:py-3 lg:px-5 flex items-center">
                            <label for="email" class="hidden lg:inline-block">
                                <img src="/images/mailbox-icon.svg" alt="mailbox letter">
                            </label>

                            <input 
                                name='email'
                                id="email" 
                                type="text" 
                                placeholder="Seu endereço de email" 
                                class="lg:bg-transparent py-2 p-3 lg:py-0 pl-4 focus-within:outline-none"
                            >

                            <input 
                                name='FNAME'
                                id="FNAME" 
                                type="text" 
                                placeholder="Seu primeiro nome" 
                                class="lg:bg-transparent py-2 p-3 lg:py-0 pl-4 focus-within:outline-none"
                            >

                            <input 
                                name='LNAME'
                                id="LNAME" 
                                type="text" 
                                placeholder="Seu último nome" 
                                class="lg:bg-transparent py-2 p-3 lg:py-0 pl-4 focus-within:outline-none"
                            >
                        </div>

                        <button type="submit" class="transition-colors duration-300 bg-black hover:bg-gray-700 mt-4 lg:mt-0 lg:ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-8">
                            Inscreva-se
                        </button>
                    </form>
                    @error('email')
                        <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </footer>
    </section>
    <x-flash />
</body>