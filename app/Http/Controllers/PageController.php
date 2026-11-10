<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function processLogin(Request $request)
    {
        $request->validate([
            'username' => 'required|min:3',
            'password' => 'required',
        ], [
            'username.required' => 'Username wajib diisi.',
            'username.min'      => 'Username minimal 3 karakter.',
            'password.required' => 'Password wajib diisi.',
        ]);

        return redirect()->route('dashboard', [
            'username' => $request->input('username'),
        ]);
    }

    public function dashboard(Request $request)
    {
        $username   = $request->query('username', 'Operator');
        $kameraList = $this->dataKamera();

        $jumlahPerStatus = fn (string $status) => count(
            array_filter($kameraList, fn ($item) => $item['status'] === $status)
        );

        $stats = [
            'total_kamera' => count($kameraList),
            'tersedia'     => $jumlahPerStatus('Tersedia'),
            'disewa'       => $jumlahPerStatus('Disewa'),
            'perawatan'    => $jumlahPerStatus('Perawatan'),
        ];

        return view('dashboard', compact('username', 'stats', 'kameraList'));
    }

    public function pengelolaan(Request $request)
    {
        $username   = $request->query('username', 'Operator');
        $kameraList = $this->dataKamera();

        return view('pengelolaan', compact('username', 'kameraList'));
    }

    public function profile(Request $request)
    {
        $username = $request->query('username', 'Operator');

        $userProfile = [
            'username'          => $username,
            'nama_lengkap'      => ucfirst($username),
            'email'             => strtolower($username) . '@amourcapture.id',
            'role'              => 'Koordinator Penyewaan Digicam',
            'nip'               => 'AC-2026-017',
            'cabang'            => 'Amour Capture Jember',
            'tanggal_bergabung' => '3 Maret 2025',
        ];

        return view('profile', compact('username', 'userProfile'));
    }

    
    private function dataKamera(): array
    {
        return [
            [
                'id'            => 'AC-001',
                'nama'          => 'Yashica FX-D 100',
                'brand'         => 'Yashica',
                'kategori'      => 'Digicam Retro',
                'warna'         => 'Biru Muda',
                'sewa_per_hari' => 75000,
                'status'        => 'Tersedia',
                'kondisi'       => 'Baik',
                'gambar'        => 'image/yashica-fx-d-100.jpg',
            ],
            [
                'id'            => 'AC-002',
                'nama'          => 'Sony Cyber-shot',
                'brand'         => 'Sony',
                'kategori'      => 'Compact Digicam',
                'warna'         => 'Pink',
                'sewa_per_hari' => 90000,
                'status'        => 'Disewa',
                'kondisi'       => 'Sangat Baik',
                'gambar'        => 'image/sony-cybershot.jpg',
            ],
            [
                'id'            => 'AC-003',
                'nama'          => 'Kodak Pixpro C1',
                'brand'         => 'Kodak',
                'kategori'      => 'Compact Digicam',
                'warna'         => 'Rose Gold',
                'sewa_per_hari' => 70000,
                'status'        => 'Tersedia',
                'kondisi'       => 'Baik',
                'gambar'        => 'image/kodak-pixpro-c1.jpg',
            ],
            [
                'id'            => 'AC-004',
                'nama'          => 'Kodak Pixpro FZ55 / FZ45',
                'brand'         => 'Kodak',
                'kategori'      => 'Compact Digicam',
                'warna'         => 'Pink',
                'sewa_per_hari' => 80000,
                'status'        => 'Tersedia',
                'kondisi'       => 'Sangat Baik',
                'gambar'        => 'image/kodak-fz55-pink.jpg',
            ],
            [
                'id'            => 'AC-005',
                'nama'          => 'Kodak Pixpro FZ55 / FZ45',
                'brand'         => 'Kodak',
                'kategori'      => 'Compact Digicam',
                'warna'         => 'Merah',
                'sewa_per_hari' => 80000,
                'status'        => 'Perawatan',
                'kondisi'       => 'Pembersihan Lensa',
                'gambar'        => 'image/kodak-fz55-merah.jpg',
            ],
            [
                'id'            => 'AC-006',
                'nama'          => 'Fujifilm Instax Mini 13',
                'brand'         => 'Fujifilm',
                'kategori'      => 'Kamera Instan',
                'warna'         => 'Pink',
                'sewa_per_hari' => 60000,
                'status'        => 'Disewa',
                'kondisi'       => 'Sangat Baik',
                'gambar'        => 'image/fujifilm-instax-mini-13.jpg',
            ],
        ];
    }
}