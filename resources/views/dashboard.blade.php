@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
@php
    $kartuStat = [
        ['label' => 'Total Kamera',  'nilai' => $stats['total_kamera']],
        ['label' => 'Tersedia',      'nilai' => $stats['tersedia']],
        ['label' => 'Sedang di Sewa', 'nilai' => $stats['disewa']],
        ['label' => 'Perawatan',     'nilai' => $stats['perawatan']],
    ];

    $warnaStatus = [
        'Tersedia'  => 'border-emerald-500 bg-emerald-50 text-emerald-700',
        'Disewa'    => 'border-amber-500 bg-amber-50 text-amber-700',
        'Perawatan' => 'border-rose-500 bg-rose-50 text-rose-600',
    ];
@endphp

<div class="space-y-5">
    <div>
        <h1 class="text-3xl font-bold text-amour-400">Dashboard</h1>
        <p class="text-lg md:text-xl text-slate-500 mt-1">Pantau koleksi digicam pada Amour Capture dan status sewanya hari ini</p>
    </div>

    <img src="{{ asset('image/banner-amour-capture.png') }}" alt="Banner Amour Capture Sewa Digicam"
         class="w-full h-auto">

    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
        @foreach($kartuStat as $kartu)
            <div class="bg-white rounded-xl px-4 py-3 min-h-24">
                <p class="text-sm text-slate-600">{{ $kartu['label'] }}</p>
                <p class="text-2xl font-bold text-amour-400 mt-3">{{ $kartu['nilai'] }}</p>
            </div>
        @endforeach
    </div>

    <div class="bg-white rounded-lg overflow-hidden">
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
</div>
@endsection