@props(['username' => ''])

@php
    $menu = [
        ['route' => 'dashboard',   'label' => 'Dashboard'],
        ['route' => 'pengelolaan', 'label' => 'Pengelolaan'],
        ['route' => 'profile',     'label' => 'Akun'],
    ];
@endphp

<aside class="shrink-0 bg-white md:w-52 md:h-screen md:sticky md:top-0">
    <div class="flex flex-wrap items-center justify-between px-4 py-3 md:block md:py-8">
        <a href="{{ route('dashboard', ['username' => $username]) }}" class="block">
            <img src="{{ asset('image/logo-amour-capture.png') }}" alt="Logo Amour Capture"
                 class="h-12 md:h-36 w-auto md:mx-auto">
        </a>

        <input type="checkbox" id="menu-toggle" class="peer hidden">
        <label for="menu-toggle" class="md:hidden cursor-pointer p-2 text-xl text-amour-400" aria-label="Buka menu">
            <i class="fa-solid fa-bars"></i>
        </label>

        <nav class="hidden peer-checked:block md:block w-full mt-3 md:mt-8">
            <p class="text-sm text-slate-600 mb-2">MENU</p>

            <ul class="space-y-2">
                @foreach($menu as $item)
                    <li>
                        <a href="{{ route($item['route'], ['username' => $username]) }}"
                           class="block text-center py-2 rounded-full bg-amour-400 hover:bg-amour-500 text-white text-sm font-medium transition">
                            {{ $item['label'] }}
                        </a>
                    </li>
                @endforeach
            </ul>

            <a href="{{ route('login') }}"
               class="block mt-6 text-center py-2 rounded-full border border-amour-400 text-amour-400 hover:bg-amour-50 text-sm font-medium transition">
                Keluar
            </a>
        </nav>
    </div>
</aside>