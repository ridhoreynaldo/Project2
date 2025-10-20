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
        // 1️⃣ Ambil semua subasset
        $subassets = DB::connection('sqlsrv')
            ->table('sub_assets')
            ->where('id_assets', $id_asset)
            ->get();

        if ($subassets->isEmpty()) {
            return response()->json(['message' => 'Subasset tidak ditemukan'], 404);
        }

        $subassetIds = $subassets->pluck('id');

        // 2️⃣ Ambil semua detail subasset
        $allDetails = DB::connection('quinary_sqlsrv')
            ->table('subasset_detail')
            ->whereIn('id_sub_assets', $subassetIds)
            ->get()
            ->keyBy('id_sub_assets');

        // 3️⃣ Ambil semua barang yang terhubung ke subasset
        $allBarangs = DB::connection('sqlsrv')
            ->table('barangs as b')
            ->join('orders as o', 'o.id_barang', '=', 'b.id')
            ->join('barang_label as bl', 'bl.id_orders', '=', 'o.id')
            ->where('bl.id_lokasi', $id_asset)
            ->whereIn('bl.id_subAsset', $subassetIds)
            ->select(
                'b.id',
                'b.nama',
                'o.id as id_orders',
                'bl.id_subAsset',
                DB::raw('COUNT(o.id) as jumlah_order')
            )
            ->groupBy('b.id', 'b.nama', 'o.id', 'bl.id_subAsset')
            ->get()
            ->groupBy('id_subAsset');

        // 4️⃣ Ambil foto SUBASSET dari documents
        $allSubassetFotos = DB::connection('sqlsrv')
            ->table('documents')
            ->whereIn('related_id', $subassetIds)
            ->get()
            ->groupBy('related_id');

        // 5️⃣ Ambil foto BARANG dari dok_orders (berdasarkan id_orders)
        $orderIds = $allBarangs->flatten()->pluck('id_orders')->unique();
        $allBarangFotos = DB::connection('sqlsrv')
            ->table('dok_orders')
            ->whereIn('id_orders', $orderIds)
            ->get()
            ->groupBy('id_orders');

        // 6️⃣ Gabungkan semua hasil
        $data = $subassets->map(function ($subasset) use ($allDetails, $allBarangs, $allSubassetFotos, $allBarangFotos) {
            $barangs = $allBarangs[$subasset->id] ?? collect();

            // Tambahkan foto barang di setiap barang
            $barangsWithFotos = $barangs->map(function ($barang) use ($allBarangFotos) {
                return [
                    'id' => $barang->id,
                    'nama' => $barang->nama,
                    'id_orders' => $barang->id_orders, // ✅ tambahkan di sini
                    'jumlah_order' => $barang->jumlah_order,
                    'fotos_barang' => $allBarangFotos[$barang->id_orders] ?? [],
                ];
            });

            return [
                'id' => $subasset->id,
                'nama_subAsset' => $subasset->nama_subAsset ?? null,
                'kapasitas' => $allDetails[$subasset->id]->kapasitas ?? null,
                'ket' => $allDetails[$subasset->id]->ket ?? null,
                'barangs' => $barangsWithFotos,
                'fotos_subasset' => $allSubassetFotos[$subasset->id] ?? [],
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
            // 1️⃣ Ambil subasset spesifik
            $subasset = DB::connection('sqlsrv')
                ->table('sub_assets')
                ->where('id_assets', $id_asset)
                ->where('id', $id_sub_asset)
                ->first();

            if (!$subasset) {
                return response()->json(['message' => 'Subasset tidak ditemukan'], 404);
            }

            // 2️⃣ Ambil detail
            $detail = DB::connection('quinary_sqlsrv')
                ->table('subasset_detail')
                ->where('id_sub_assets', $id_sub_asset)
                ->first();

            // 3️⃣ Ambil barang-barang
            $barangs = DB::connection('sqlsrv')
                ->table('barangs as b')
                ->join('orders as o', 'o.id_barang', '=', 'b.id')
                ->join('barang_label as bl', 'bl.id_orders', '=', 'o.id')
                ->where('bl.id_lokasi', $id_asset)
                ->where('bl.id_subAsset', $id_sub_asset)
                ->select(
                    'b.id',
                    'b.nama',
                    'o.id as id_orders',
                    DB::raw('COUNT(o.id) as jumlah_order')
                )
                ->groupBy('b.id', 'b.nama', 'o.id')
                ->get();

            // 4️⃣ Ambil foto subasset dari documents
            $fotosSubasset = DB::connection('sqlsrv')
                ->table('documents')
                ->where('related_id', $id_sub_asset)
                ->get();

            // 5️⃣ Ambil foto barang dari dok_orders
            $orderIds = $barangs->pluck('id_orders')->unique();
            $fotosBarang = DB::connection('sqlsrv')
                ->table('dok_orders')
                ->whereIn('id_orders', $orderIds)
                ->get()
                ->groupBy('id_orders');

            // 6️⃣ Tambahkan foto barang ke setiap item
            $barangsWithFotos = $barangs->map(function ($barang) use ($fotosBarang) {
                return [
                    'id' => $barang->id,
                    'nama' => $barang->nama,
                    'id_orders' => $barang->id_orders, // ✅ tambahkan di sini juga
                    'jumlah_order' => $barang->jumlah_order,
                    'fotos_barang' => $fotosBarang[$barang->id_orders] ?? [],
                ];
            });

            // 7️⃣ Susun data final
            $data = [
                'id' => $subasset->id,
                'nama_subAsset' => $subasset->nama_subAsset ?? null,
                'kapasitas' => $detail->kapasitas ?? null,
                'ket' => $detail->ket ?? null,
                'barangs' => $barangsWithFotos,
                'fotos_subasset' => $fotosSubasset,
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
