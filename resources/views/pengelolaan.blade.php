@extends('layouts.app')

@section('title', 'Pengelolaan Kamera')

@section('content')
@php
    $warnaStatus = [
        'Tersedia'  => 'border-emerald-500 bg-emerald-50 text-emerald-700',
        'Disewa'    => 'border-amber-500 bg-amber-50 text-amber-700',
        'Perawatan' => 'border-rose-500 bg-rose-50 text-rose-600',
    ];
@endphp

<div class="space-y-5">
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div>
            <h1 class="text-3xl font-bold text-amour-400">Daftar Kamera</h1>
            <p class="text-slate-500 mt-1">
                {{ count($kameraList) }} digicam lengkap dengan harga sewa, kondisi, dan statusnya.
            </p>
        </div>
    </div>

    <div class="hidden md:block bg-white rounded-lg overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full min-w-[760px] text-left">
                <thead class="bg-amour-200 font-mono text-[11px] uppercase text-slate-700">
                    <tr>
                        <th class="px-5 py-3 font-normal">ID</th>
                        <th class="px-5 py-3 font-normal">Kamera</th>
                        <th class="px-5 py-3 font-normal">Kategori</th>
                        <th class="px-5 py-3 font-normal">Sewa / Hari</th>
                        <th class="px-5 py-3 font-normal">Kondisi</th>
                        <th class="px-5 py-3 font-normal">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($kameraList as $kamera)
                        <tr class="border-b border-amour-100 hover:bg-slate-50 transition">
                            <td class="px-5 py-3 font-mono text-xs font-semibold text-amour-400">{{ $kamera['id'] }}</td>
                            <td class="px-5 py-3">
                                <div class="flex items-center gap-3">
                                    <img src="{{ asset($kamera['gambar']) }}" alt="{{ $kamera['nama'] }}"
                                         class="w-14 h-14 rounded-lg object-cover">
                                    <div>
                                        <p class="text-sm font-semibold text-slate-800">{{ $kamera['nama'] }}</p>
                                        <p class="text-xs text-slate-500">{{ $kamera['brand'] }} &middot; {{ $kamera['warna'] }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-5 py-3 text-sm">{{ $kamera['kategori'] }}</td>
                            <td class="px-5 py-3">
                                <p class="font-mono text-sm font-semibold text-slate-800">Rp {{ number_format($kamera['sewa_per_hari'], 0, ',', '.') }}</p>
                                <p class="text-[11px] text-slate-500">per 24 jam</p>
                            </td>
                            <td class="px-5 py-3 text-sm">{{ $kamera['kondisi'] }}</td>
                            <td class="px-5 py-3">
                                <span class="inline-block border-l-2 px-2 py-0.5 font-mono text-xs {{ $warnaStatus[$kamera['status']] ?? 'border-slate-400 bg-slate-50 text-slate-600' }}">
                                    {{ $kamera['status'] }}
                                </span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

=    <div class="md:hidden space-y-4">
        @foreach($kameraList as $kamera)
            <div class="bg-white rounded-lg p-4">
                <div class="flex items-start gap-3">
                    <img src="{{ asset($kamera['gambar']) }}" alt="{{ $kamera['nama'] }}"
                         class="w-16 h-16 rounded-lg object-cover">
                    <div class="flex-1">
                        <p class="font-mono text-xs font-semibold text-amour-400">{{ $kamera['id'] }}</p>
                        <p class="text-sm font-semibold text-slate-800">{{ $kamera['nama'] }}</p>
                        <p class="text-xs text-slate-500">{{ $kamera['brand'] }} &middot; {{ $kamera['kategori'] }} &middot; {{ $kamera['warna'] }}</p>
                    </div>
                    <span class="inline-block border-l-2 px-2 py-0.5 font-mono text-xs {{ $warnaStatus[$kamera['status']] ?? 'border-slate-400 bg-slate-50 text-slate-600' }}">
                        {{ $kamera['status'] }}
                    </span>
                </div>

                <div class="mt-3 pt-3 border-t border-amour-100 flex items-center justify-between">
                    <span class="font-mono text-sm font-semibold text-slate-800">
                        Rp {{ number_format($kamera['sewa_per_hari'], 0, ',', '.') }} / 24 jam
                    </span>
                    <span class="text-xs text-slate-500">{{ $kamera['kondisi'] }}</span>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection