<?php

namespace App\Http\Controllers\Asrama;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class MahasiswaController extends Controller
{
    public function index(Request $request)
    {
        // 1. Validasi input dari body JSON
        $validator = Validator::make($request->all(), [
            'jenis_kelamin' => 'sometimes|string|in:L,P,PR', // Gunakan 'sometimes' agar validasi hanya berjalan jika field dikirim
            'status' => 'sometimes|string',
            'universitas' => 'sometimes|string',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // 2. Mulai Query Builder
        // Ganti 'mahasiswa' dengan nama tabel Anda yang sebenarnya
        $query = DB::connection('secondary_sqlsrv')->table('mahasiswa');

        // 3. Terapkan filter secara dinamis menggunakan when()
        // Ini adalah cara yang bersih untuk menambahkan 'where' hanya jika ada input
        $query->when($request->filled('jenis_kelamin'), function ($q) use ($request) {
            return $q->where('JENISKELAMIN', $request->input('jenis_kelamin'));
        });

        $query->when($request->filled('status'), function ($q) use ($request) {
            return $q->where('STATUSMHS', $request->input('status'));
        });

        $query->when($request->filled('universitas'), function ($q) use ($request) {
            // Gunakan 'like' untuk pencarian yang lebih fleksibel
            return $q->where('UNIVERSITAS', 'like', '%' . $request->input('universitas') . '%');
        });

        // 4. Eksekusi query dan ambil hasilnya
        // $results = $query->get(); //semua kolom
        $results = $query->select('NPM', 'NAMA','STATUSMHS','JENISKELAMIN','UNIVERSITAS','HP','ALAMAT','nik','NAMAAYAH','NAMAIBU','nomor_ortu','TGLMASUK',
        'TGLLAHIR','PRODI','STAMBUK','AGAMA')->get();//,'IDFAKULTAS'

        // 5. Kembalikan respons
        return response()->json([
            'status' => 'success',
            'count' => $results->count(), // Jumlah data yang ditemukan
            'data' => $results,
        ]);
    }

    public function show($NPM)
    {
        $mahasiswa = DB::connection('secondary_sqlsrv')
            ->table('mahasiswa as m')
            ->join('fakultas as f', 'm.IDFAKULTAS', '=', 'f.IDFAKULTAS')
            ->select(
                'm.NPM',
                'm.NAMA',
                'm.STATUSMHS',
                'm.JENISKELAMIN',
                'm.UNIVERSITAS',
                'm.HP',
                'm.ALAMAT',
                'm.nik',
                'm.NAMAAYAH',
                'm.NAMAIBU',
                'm.nomor_ortu',
                'm.TGLMASUK',
                'm.TGLLAHIR',
                'm.IDFAKULTAS',
                'f.FAKULTAS as fakultas',
                'm.PRODI',
                'm.STAMBUK',
                'm.AGAMA'
            )
            ->where('NPM', $NPM)
            ->first();

        if (!$mahasiswa) {
            return response()->json(['message' => 'Mahasiswa tidak ditemukan'], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $mahasiswa,
        ]);
    }
}
