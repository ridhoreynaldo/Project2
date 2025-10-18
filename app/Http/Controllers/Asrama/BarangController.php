<?php

namespace App\Http\Controllers\Asrama;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BarangController extends Controller
{
    public function indexByAssetAndSubAsset($id_asset, $id_sub_asset)
    {
        // Ambil semua subasset berdasarkan id_asset
        $subassets = DB::connection('sqlsrv')
            ->table('sub_assets')
            ->where('id_assets', $id_asset)
            ->get();

        if ($subassets->isEmpty()) {
            return response()->json(['message' => 'Asset tidak ditemukan'], 404);
        }

        // Ambil barang-barang di dalam subasset ini
        $barangs = DB::connection('sqlsrv')
            ->table('barangs as b')
            ->join('orders as o', 'o.id_barang', '=', 'b.id')
            ->join('barang_label as bl', 'bl.id_orders', '=', 'o.id')
            ->where('bl.id_lokasi', $id_asset)
            ->where('bl.id_subAsset', $id_sub_asset)
            ->select('b.id', 'b.nama', DB::raw('COUNT(o.id) as jumlah_order'))
            ->groupBy('b.id', 'b.nama')
            ->get();

        if ($barangs->isEmpty()) {
            return response()->json(['message' => 'Tidak ada barang ditemukan untuk sub asset ini.'], 404);
        }
        
        return response()->json([
            'status' => 'success',
            'count' => count($barangs),
            'data' => $barangs,
        ]);
    }
}
