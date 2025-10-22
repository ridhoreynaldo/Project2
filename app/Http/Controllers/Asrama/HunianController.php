<?php

namespace App\Http\Controllers\Asrama;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Exception;

class HunianController extends Controller
{
    public function filters(Request $request)
    {
        $status = $request->input('status'); // aktif / tidak_aktif
        $statusTransaksi = $request->input('status_transaksi'); // pending / sukses / dll
        $today = Carbon::today();

        $query = DB::connection('quinary_sqlsrv')
            ->table('pemesanan as p')
            ->leftJoin('transaksi as t', 't.id_pemesanan', '=', 'p.id')
            ->select(
                'p.id',
                'p.npm',
                'p.id_sub_asset',
                'p.tgl_pesan',
                'p.tgl_masuk',
                'p.tgl_keluar',
                'p.total_bayar',
                'p.status as status_pemesanan',
                't.tgl_bayar',
                't.jlh_bayar',
                't.metode_bayar',
                't.status as status_transaksi'
            );

        // Filter berdasarkan status pemesanan
        if ($status === 'aktif') {
            $query->where('p.tgl_keluar', '>=', $today);
        } elseif ($status === 'tidak_aktif') {
            $query->where('p.tgl_keluar', '<', $today);
        }

        // Filter berdasarkan status transaksi jika ada
        if ($statusTransaksi) {
            $query->where('t.status', $statusTransaksi);
        }

        $data = $query->orderBy('p.tgl_masuk', 'asc')->get();

        return response()->json([
            'status' => 'success',
            'filter' => [
                'status' => $status,
                'status_transaksi' => $statusTransaksi,
            ],
            'total' => $data->count(),
            'data' => $data,
        ]);
    }

    public function filter(Request $request)
{
    $status = $request->input('status');
    $statusTransaksi = $request->input('status_transaksi');
    $today = Carbon::today();

    // === Ambil data dari DB quinary_sqlsrv ===
    $data = DB::connection('quinary_sqlsrv')
        ->table('pemesanan as p')
        ->leftJoin('transaksi as t', 't.id_pemesanan', '=', 'p.id')
        ->select(
            'p.id',
            'p.npm',
            'p.id_sub_asset',
            'p.tgl_pesan',
            'p.tgl_masuk',
            'p.tgl_keluar',
            'p.total_bayar',
            'p.status as status_pemesanan',
            't.tgl_bayar',
            't.jlh_bayar',
            't.metode_bayar',
            't.status as status_transaksi'
        )
        ->when($status === 'aktif', fn($q) => $q->where('p.tgl_keluar', '>=', $today))
        ->when($status === 'tidak_aktif', fn($q) => $q->where('p.tgl_keluar', '<', $today))
        ->when($statusTransaksi, fn($q) => $q->where('t.status', $statusTransaksi))
        ->orderBy('p.tgl_masuk', 'asc')
        ->get();

    // === Ambil data mahasiswa dari DB primary ===
    $npmList = $data->pluck('npm')->unique()->toArray();

    $mahasiswa = DB::connection('secondary_sqlsrv')
        ->table('mahasiswa')
        ->whereIn('NPM', $npmList)
        ->pluck('NAMA', 'NPM'); // ['2101001' => 'Ridho Akbar']

    // === Gabungkan data ===
    $data = $data->map(function ($item) use ($mahasiswa) {
        $item->nama_mahasiswa = $mahasiswa[$item->npm] ?? '-';
        return $item;
    });

    return response()->json([
        'status' => 'success',
        'total' => $data->count(),
        'data' => $data,
    ]);
}

    public function store(Request $request)
    {
        $validated = $request->validate([
            'npm'          => 'required|string|max:50',
            'id_sub_asset' => 'nullable|string|max:50',
            'tgl_masuk'    => 'required|date',
            'tgl_keluar'   => 'required|date|after_or_equal:tgl_masuk',
            'total_bayar'  => 'required|numeric|min:0',
            'metode_bayar' => 'nullable|string|max:50',
        ]);

        DB::connection('quinary_sqlsrv')->beginTransaction();

        try {
            // 1️⃣ Simpan ke tabel pemesanan
            $idPemesanan = DB::connection('quinary_sqlsrv')
                ->table('pemesanan')
                ->insertGetId([
                    'npm'          => $validated['npm'],
                    'id_sub_asset' => $validated['id_sub_asset'],
                    'tgl_pesan'    => Carbon::now(),
                    'tgl_masuk'    => $validated['tgl_masuk'],
                    'tgl_keluar'   => $validated['tgl_keluar'],
                    'total_bayar'  => $validated['total_bayar'],
                    'status'       => 'menunggu pembayaran',
                    'created_at'   => Carbon::now(),
                    'updated_at'   => Carbon::now(),
                ]);

            // 2️⃣ Simpan ke tabel transaksi (otomatis pending)
            DB::connection('quinary_sqlsrv')
                ->table('transaksi')
                ->insert([
                    'id_pemesanan' => $idPemesanan,
                    'tgl_bayar'    => Carbon::now(),
                    'jlh_bayar'    => $validated['total_bayar'],
                    'metode_bayar' => $validated['metode_bayar'] ?? 'manual',
                    'status'       => 'pending',
                    'created_at'   => Carbon::now(),
                    'updated_at'   => Carbon::now(),
                ]);

            DB::connection('quinary_sqlsrv')->commit();

            return response()->json([
                'status'  => 'success',
                'message' => 'Pemesanan dan transaksi berhasil dibuat',
                'data' => [
                    'id_pemesanan' => $idPemesanan,
                    'npm'          => $validated['npm'],
                    'id_sub_asset' => $validated['id_sub_asset'],
                    'total_bayar'  => $validated['total_bayar'],
                ],
            ]);
        } catch (Exception $e) {
            DB::connection('quinary_sqlsrv')->rollBack();
            return response()->json([
                'status'  => 'error',
                'message' => 'Gagal menyimpan data: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function updateWebhook(Request $request)
    {
        $validated = $request->validate([
            'id_pemesanan' => 'required|integer',
        ]);

        DB::connection('quinary_sqlsrv')->beginTransaction();

        try {
            // Update transaksi menjadi sukses
            DB::connection('quinary_sqlsrv')
                ->table('transaksi')
                ->where('id_pemesanan', $validated['id_pemesanan'])
                ->where('status', 'pending')
                ->update([
                    'status' => 'sukses',
                    'updated_at' => Carbon::now(),
                ]);

            // Update status pemesanan menjadi terkonfirmasi
            DB::connection('quinary_sqlsrv')
                ->table('pemesanan')
                ->where('id', $validated['id_pemesanan'])
                ->update([
                    'status' => 'terkonfirmasi',
                    'updated_at' => Carbon::now(),
                ]);

            DB::connection('quinary_sqlsrv')->commit();

            return response()->json([
                'status' => 'success',
                'message' => 'Transaksi dan pemesanan berhasil diupdate',
            ]);
        } catch (Exception $e) {
            DB::connection('quinary_sqlsrv')->rollBack();
            return response()->json([
                'status' => 'error',
                'message' => 'Gagal update: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function updateSubAsset(Request $request)
    {
        $validated = $request->validate([
            'id_pemesanan' => 'required|integer',
            'id_sub_asset' => 'required|string|max:50',
        ]);

        try {
            $affected = DB::connection('quinary_sqlsrv')
                ->table('pemesanan')
                ->where('id', $validated['id_pemesanan'])
                ->update([
                    'id_sub_asset' => $validated['id_sub_asset'],
                    'updated_at' => Carbon::now(),
                ]);

            if ($affected === 0) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Pemesanan tidak ditemukan',
                ], 404);
            }

            return response()->json([
                'status' => 'success',
                'message' => 'ID Sub Asset berhasil diupdate',
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Gagal update Sub Asset: ' . $e->getMessage(),
            ], 500);
        }
    }
}
