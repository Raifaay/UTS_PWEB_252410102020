@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="relative flex-1 flex flex-col items-center justify-center overflow-hidden px-4 py-10">
    <div class="absolute bottom-0 left-1/2 -translate-x-1/2 w-[140%] h-24 md:h-32 bg-amour-200 rounded-t-[100%]"></div>

    <div class="relative z-10 w-full max-w-sm">
        <img src="{{ asset('image/logo-amour-capture.png') }}" alt="Logo Amour Capture"
             class="h-28 w-auto mx-auto mb-6">

        <form action="{{ route('login.process') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label for="username" class="block text-sm font-semibold text-amour-400 mb-1">Username</label>
                <input type="text" id="username" name="username" value="{{ old('username') }}" autofocus
                       class="w-full px-4 py-2 bg-white border rounded-lg text-slate-700 focus:outline-none focus:ring-2 focus:ring-amour-100 transition @error('username') border-rose-400 @else border-amour-300 focus:border-amour-400 @enderror">
                @error('username')
                    <p class="text-xs text-rose-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="password" class="block text-sm font-semibold text-amour-400 mb-1">Kata Sandi</label>
                <input type="password" id="password" name="password"
                       class="w-full px-4 py-2 bg-white border rounded-lg text-slate-700 focus:outline-none focus:ring-2 focus:ring-amour-100 transition @error('password') border-rose-400 @else border-amour-300 focus:border-amour-400 @enderror">
                @error('password')
                    <p class="text-xs text-rose-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit"
                    class="w-full bg-amour-300 hover:bg-amour-400 text-white font-semibold py-2.5 rounded-lg transition">
                Login
            </button>
        </form>
    </div>
</div>
@endsection