@extends('layouts.app')

@section('title', 'Akun')

@section('content')
@php
    $detail = [
        'Username'        => 'username',
        'Email'           => 'email',
        'ID Staf'         => 'nip',
        'Cabang'          => 'cabang',
        'Bergabung Sejak' => 'tanggal_bergabung',
    ];
@endphp

<div class="bg-white">
    <img src="{{ asset('image/banner-amour-capture.png') }}" alt="Banner Amour Capture Sewa Digicam"
         class="block w-full h-auto">

    <div class="md:flex md:gap-12 pb-10">
        <div class="relative z-10 shrink-0 -mt-16 px-6 md:px-0">
            <div class="w-40 h-40 md:w-44 md:h-44 rounded-full bg-white border-8 border-amour-400 flex items-center justify-center text-xl font-bold text-amour-400">
                {{ strtoupper(substr($userProfile['username'], 0, 1)) }}
            </div>
        </div>

        <div class="flex-1 px-6 md:px-0 md:pr-10 pt-3">
            <h1 class="text-2xl font-bold text-amour-400">{{ $userProfile['nama_lengkap'] }}</h1>
            <p class="text-lg text-slate-500">{{ $userProfile['role'] }}</p>

            <div class="border-t border-slate-200 mt-5 pt-6 grid grid-cols-1 sm:grid-cols-2 gap-x-10 gap-y-6">
                @foreach($detail as $label => $kunci)
                    <div>
                        <p class="text-xs font-semibold uppercase text-slate-500">{{ $label }}</p>
                        <p class="mt-1 text-base font-medium text-slate-800 break-words">{{ $userProfile[$kunci] }}</p>
                    </div>
                @endforeach

                <div>
                    <p class="text-xs font-semibold uppercase text-slate-500">Status Akun</p>
                    <p class="mt-1 text-base font-medium text-emerald-400">Aktif</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection