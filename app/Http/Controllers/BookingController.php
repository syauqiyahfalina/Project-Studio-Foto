<?php

namespace App\Http\Controllers;

use App\Models\Reservasi;
use App\Models\DetailReservasi;
use App\Models\PaketPoto;
use App\Models\Studio;
use App\Models\Fotografer;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    // Tampilkan riwayat booking milik user yang sedang login
    public function index()
    {
        $reservasis = Reservasi::with(['paket', 'studio'])
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('frontend.booking.index', compact('reservasis'));
    }

    // Tampilkan Form Booking Frontend
    public function create()
    {
        $pakets = PaketPoto::all();
        $studios = Studio::where('status', 'aktif')->get();
        $fotografers = Fotografer::all();

        return view('frontend.booking.create', compact('pakets', 'studios', 'fotografers'));
    }

    // Proses Simpan Booking ke Database
    public function store(Request $request)
    {
        $request->validate([
            'paket_id' => 'required',
            'studio_id' => 'required',
            'fotografer_id' => 'required',
            'tanggal_reservasi' => 'required|date|after:today',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
        ]);

        $paket = PaketPoto::findOrFail($request->paket_id);

        // Amankan data menggunakan DB Transaction (Sintaksis sudah difix)
        DB::transaction(function () use ($request, $paket) {
            // 1. Insert ke tabel reservasi
            $reservasi = Reservasi::create([
                'user_id'           => Auth::id(),
                'paket_id'          => $request->paket_id,
                'studio_id'         => $request->studio_id,
                'fotografer_id'     => $request->fotografer_id,
                'tanggal_reservasi' => $request->tanggal_reservasi,
                'jam_mulai'         => $request->jam_mulai,
                'jam_selesai'       => $request->jam_selesai,
                'total_harga'       => $paket->harga,
                'status'            => 'Pending',
            ]);

            // 2. Insert ke tabel detail_reservasi milik lo
            DetailReservasi::create([
                'reservasi_id'  => $reservasi->id,
                'fotografer_id' => $request->fotografer_id,
            ]);
        });

        return redirect()->route('booking.index')->with('success', 'Reservasi berhasil dibuat!');
    }

    // Tampilkan Detail Invoice & Informasi Sesi Reservasi
    public function show($id)
    {
        // Cari reservasi berdasarkan ID dan pastikan data itu milik user yang sedang login
        $reservasi = Reservasi::with(['paket', 'studio'])
            ->where('user_id', Auth::id())
            ->findOrFail($id);

        // Membuka file resources/views/frontend/booking/show.blade.php
        return view('frontend.booking.show', compact('reservasi'));
    }
    

    /**
     * FITUR BARU: Proses Pengiriman File Bukti Transaksi Pembayaran
     */
    public function pay(Request $request, $id)
    {
        // Validasi input file wajib gambar, format jpg/png, maksimal 2MB
        $request->validate([
            'bukti_pembayaran' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Pastikan data reservasi ini emang punya user yang lagi login
        $reservasi = Reservasi::where('user_id', Auth::id())->findOrFail($id);

        if ($request->file('bukti_pembayaran')) {
            // Simpan gambar ke folder storage/app/public/bukti_bayar
            $path = $request->file('bukti_pembayaran')->store('bukti_bayar', 'public');

            // 1. Masukkan data transaksi ke tabel pembayaran
            Pembayaran::create([
                'reservasi_id' => $reservasi->id,
                'jumlah_bayar' => $reservasi->total_harga,
                'bukti_bayar'  => $path,
                'status'       => 'Pending', // Menunggu divalidasi admin di backend
            ]);

            // 2. Update status di tabel reservasi utama agar admin tahu ada update
            $reservasi->update([
                'status' => 'Menunggu Konfirmasi'
            ]);
        }

        return redirect()->back()->with('success', 'Bukti pembayaran berhasil diupload! Menunggu verifikasi admin.');
    }
}