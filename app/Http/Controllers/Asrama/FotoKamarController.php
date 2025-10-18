<?php

namespace App\Http\Controllers\Asrama;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class FotoKamarController extends Controller
{
    public function showBySubAsset($id_sub_asset)
    {
        $fotos = DB::connection('quinary_sqlsrv')
                    ->table('list_foto')
                    ->where('id_sub_assets', $id_sub_asset)
                    ->get();

        if ($fotos->isEmpty()) {
            return response()->json([
                'message' => 'Tidak ada foto ditemukan untuk Sub Asset ini.',
                'data' => []
            ], 404);
        }

        return response()->json([
            'message' => 'Data foto berhasil diambil.',
            'data' => $fotos
        ], 200);
    }

    public function storeBySubAsset(Request $request, $id_sub_asset)
    {
        $validator = Validator::make($request->all(), [
            'foto' => [
                'required',
                'string',
                // Regex ini hanya memastikan string diakhiri dengan ekstensi gambar.// Case-insensitive (jpg atau JPG akan lolos).
                'regex:/\.(jpg|jpeg|png|gif|svg|webp)$/i'
            ]
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $fotoUrl = $request->input('foto');

        $id = DB::connection('quinary_sqlsrv')->table('list_foto')->insertGetId([
            'id_sub_assets' => $id_sub_asset,
            'foto' => $fotoUrl,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $newFoto = DB::connection('quinary_sqlsrv')->table('list_foto')->find($id);

        return response()->json([
            'message' => 'URL/Path Foto berhasil disimpan.',
            'data' => $newFoto
        ], 201);
    }
    
    public function update(Request $request, $id_foto)
    {
        // Validasi input baru
        $validator = Validator::make($request->all(), [
            'foto' => [
                'required',
                'string',
                // Regex yang sama untuk memastikan formatnya benar
                'regex:/\.(jpg|jpeg|png|gif|svg|webp)$/i'
            ]
        ]);
    
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
    
        // Cari foto yang ada
        $foto = DB::connection('quinary_sqlsrv')->table('list_foto')->find($id_foto);
    
        if (!$foto) {
            return response()->json(['message' => 'Foto tidak ditemukan.'], 404);
        }
    
        // // 1. Hapus file lama dari storage
        // Storage::disk('public')->delete($foto->foto);

        // // 2. Upload file baru
        // $path = $request->file('foto')->store('sub_asset_fotos', 'public');

        // Lakukan update
        DB::connection('quinary_sqlsrv')->table('list_foto')
            ->where('id', $id_foto)
            ->update([
                'foto' => $request->input('foto'),
                'updated_at' => now()
            ]);
    
        // Ambil data terbaru untuk dikirim sebagai response
        $updatedFoto = DB::connection('quinary_sqlsrv')->table('list_foto')->find($id_foto);
    
        return response()->json([
            'message' => 'Data foto berhasil diperbarui.',
            'data' => $updatedFoto
        ], 200);
    }

    public function delete($id_foto)
    {
        // 1. Cari record foto untuk mendapatkan path file-nya
        $foto = DB::connection('quinary_sqlsrv')->table('list_foto')->find($id_foto);

        if (!$foto) {
            return response()->json(['message' => 'Foto tidak ditemukan.'], 404);
        }

        // 2. Hapus file fisik dari storage
        // Ini aman bahkan jika $foto->foto adalah URL eksternal, karena Storage hanya akan menghapus file lokal
        Storage::disk('public')->delete($foto->foto);

        // 3. Hapus record dari database
        DB::connection('quinary_sqlsrv')->table('list_foto')->where('id', $id_foto)->delete();

        return response()->json([
            'message' => 'Foto berhasil dihapus.'
        ], 200);
    }
}
