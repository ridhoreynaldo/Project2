<?php

namespace App\Http\Controllers\Asrama;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubAssetController extends Controller
{
    public function index($id_asset)
    {
        try {
            $subassets = DB::connection('sqlsrv')
                ->table('sub_assets')
                ->where('id_assets', $id_asset)
                ->get();

            if ($subassets->isEmpty()) {
                return response()->json(['message' => 'Subasset tidak ditemukan'], 404);
            }

            $ids = $subassets->pluck('id')->toArray();

            $details = DB::connection('quinary_sqlsrv')
                ->table('subasset_detail')
                ->whereIn('id_sub_assets', $ids)
                ->get()
                ->keyBy('id_sub_assets'); // agar mudah dicocokkan per subasset

            $result = $subassets->map(function ($s) use ($details) {
                $detail = $details[$s->id] ?? null;

                return [
                    'id' => $s->id,
                    'nama_subAsset' => $s->nama_subAsset ?? null,
                    'kapasitas' => $detail->kapasitas ?? null,
                    'ket' => $detail->ket ?? null,
                ];
            });

            return response()->json([
                'status' => 'success',
                'count' => $result->count(),
                'data' => $result,
            ]);
        } catch (\Throwable $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Internal Server Error',
                'error' => $e->getMessage(), // hapus ini di production
            ], 500);
        }
    }

    public function show($id_assets, $id_sub_asset)
    {
        $subasset = DB::connection('sqlsrv')
            ->table('sub_assets')
            ->where('id_assets', $id_assets)
            ->where('id', $id_sub_asset)
            ->first();

        if (!$subasset) {
            return response()->json(['message' => 'Subasset tidak ditemukan'], 404);
        }

        $detail = DB::connection('quinary_sqlsrv')
            ->table('subasset_detail')
            ->where('id_sub_assets',$subasset->id)
            ->first();

        $result = [
            'id' => $subasset->id,
            'nama_subAsset' => $subasset->nama_subAsset ?? null,
            'kapasitas' => $detail->kapasitas ?? null,
            'ket' => $detail->ket ?? null,
        ];

        return response()->json([
            'status' => 'success',
            'data' => $result,
        ]);
    }

    public function showComplete($id_asset)
    {
        // STEP 1: Ambil semua subasset (1 query)
        $subassets = DB::connection('sqlsrv')
            ->table('sub_assets')
            ->where('id_assets', $id_asset)
            ->get();

        if ($subassets->isEmpty()) {
            return response()->json(['message' => 'Subasset tidak ditemukan'], 404);
        }
        
        // Ambil semua ID subasset untuk klausa WHERE IN
        $subassetIds = $subassets->pluck('id');

        // STEP 2: Ambil SEMUA detail yang relevan dalam satu kali jalan (1 query)
        $allDetails = DB::connection('quinary_sqlsrv')
            ->table('subasset_detail')
            ->whereIn('id_sub_assets', $subassetIds)
            ->get()
            ->keyBy('id_sub_assets'); // Jadikan id_sub_assets sebagai key agar mudah dicari

        // STEP 3: Ambil SEMUA barang yang relevan dalam satu kali jalan (1 query)
        $allBarangs = DB::connection('sqlsrv')
            ->table('barangs as b')
            ->join('orders as o', 'o.id_barang', '=', 'b.id')
            ->join('barang_label as bl', 'bl.id_orders', '=', 'o.id')
            ->where('bl.id_lokasi', $id_asset)
            ->whereIn('bl.id_subAsset', $subassetIds) // Gunakan whereIn
            ->select('b.id', 'b.nama', 'bl.id_subAsset', DB::raw('COUNT(o.id) as jumlah_order'))
            ->groupBy('b.id', 'b.nama', 'bl.id_subAsset')
            ->get()
            ->groupBy('id_subAsset'); // Kelompokkan berdasarkan id_subAsset

        // STEP 4: Ambil SEMUA foto yang relevan dalam satu kali jalan (1 query)
        $allFotos = DB::connection('quinary_sqlsrv')
            ->table('list_foto')
            ->whereIn('id_sub_assets', $subassetIds) // Gunakan whereIn
            ->get()
            ->groupBy('id_sub_assets'); // Kelompokkan berdasarkan id_sub_assets

        // STEP 5: Gabungkan semua data yang sudah diambil (tanpa query lagi)
        $data = $subassets->map(function ($subasset) use ($allDetails, $allBarangs, $allFotos) {
            return [
                'id' => $subasset->id,
                'nama_subAsset' => $subasset->nama_subAsset ?? null,
                'kapasitas' => $allDetails[$subasset->id]->kapasitas ?? null,
                'ket' => $allDetails[$subasset->id]->ket ?? null,
                'barangs' => $allBarangs[$subasset->id] ?? [], // Ambil dari koleksi barang
                'fotos' => $allFotos[$subasset->id] ?? [],   // Ambil dari koleksi foto
            ];
        });

        return response()->json([
            'status' => 'success',
            'count' => $data->count(),
            'data' => $data,
        ]);
    }

    public function showCompleteDetail($id_asset, $id_sub_asset)
    {
        try {
            // 1. Cari SATU subasset spesifik
            $subasset = DB::connection('sqlsrv')
                ->table('sub_assets')
                ->where('id_assets', $id_asset)
                ->where('id', $id_sub_asset)
                ->first();

            if (!$subasset) {
                return response()->json(['message' => 'Subasset spesifik tidak ditemukan'], 404);
            }

            // 2. Ambil detail
            $detail = DB::connection('quinary_sqlsrv')
                ->table('subasset_detail')
                ->where('id_sub_assets', $id_sub_asset)
                ->first();

            // 3. Ambil barang-barang
            $barangs = DB::connection('sqlsrv')
                ->table('barangs as b')
                ->join('orders as o', 'o.id_barang', '=', 'b.id')
                ->join('barang_label as bl', 'bl.id_orders', '=', 'o.id')
                ->where('bl.id_lokasi', $id_asset)
                ->where('bl.id_subAsset', $id_sub_asset)
                ->select('b.id', 'b.nama', DB::raw('COUNT(o.id) as jumlah_order'))
                ->groupBy('b.id', 'b.nama')
                ->get();
                
            // ✅ [TAMBAHAN] Ambil foto-foto untuk subasset ini
            $fotos = DB::connection('quinary_sqlsrv')
                ->table('list_foto')
                ->where('id_sub_assets', $id_sub_asset)
                ->get();

            // 4. Susun data respons
            $data = [
                'id' => $subasset->id,
                'nama_subAsset' => $subasset->nama_subAsset ?? null,
                'kapasitas' => $detail->kapasitas ?? null,
                'ket' => $detail->ket ?? null,
                'barangs' => $barangs,
                'fotos' => $fotos, // ✅ [TAMBAHAN] Masukkan data foto ke response
            ];

            return response()->json([
                'status' => 'success',
                'data' => $data,
            ]);

        } catch (\Throwable $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Internal Server Error',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
    
    public function insertOrUpdateDetail(Request $request, $id_sub_assets)
    {
        try {
            $validated = $request->validate([
                'kapasitas' => 'nullable|integer|min:0',
                'ket' => 'nullable|string|max:255',
            ]);
    
            // Gabungkan pengecekan, update, dan insert dalam satu perintah
            DB::connection('quinary_sqlsrv')
                ->table('subasset_detail')
                ->updateOrInsert(
                    ['id_sub_assets' => $id_sub_assets], // Kondisi untuk mencari data
                    $validated                         // Data yang akan di-update atau di-insert
                );
    
            return response()->json([
                'status' => 'success',
                'message' => 'Detail subasset berhasil disimpan/diperbarui',
            ]);
        } catch (\Throwable $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Internal Server Error',
                'error' => $e->getMessage(), // hapus di production
            ], 500);
        }
    }

}
