<?php

namespace App\Http\Controllers\Asrama;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PeriodeHargaController extends Controller
{
    public function index()
    {
        $data = DB::connection('quinary_sqlsrv')->table('periode_harga')->get();
        
        return response()->json([
            'status' => 'success',
            'count' => $data->count(),
            'data' => $data
        ], 200);
    }

    public function show($id)
    {
        $periode = DB::connection('quinary_sqlsrv')->table('periode_harga')->find($id);

        if (!$periode) {
            return response()->json(['message' => 'Data periode tidak ditemukan'], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $periode
        ], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'periode' => 'required|string|max:255',
            'harga' => 'required|integer|min:0'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $id = DB::connection('quinary_sqlsrv')->table('periode_harga')->insertGetId([
            'periode' => $request->periode,
            'harga' => $request->harga,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $newPeriode = DB::connection('quinary_sqlsrv')->table('periode_harga')->find($id);

        return response()->json([
            'message' => 'Data periode berhasil ditambahkan.',
            'data' => $newPeriode
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'periode' => 'required|string|max:255',
            'harga' => 'required|integer|min:0'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $periode = DB::connection('quinary_sqlsrv')->table('periode_harga')->find($id);
        if (!$periode) {
            return response()->json(['message' => 'Data periode tidak ditemukan.'], 404);
        }

        DB::connection('quinary_sqlsrv')->table('periode_harga')
            ->where('id', $id)
            ->update([
                'periode' => $request->periode,
                'harga' => $request->harga,
                'updated_at' => now()
            ]);

        $updatedPeriode = DB::connection('quinary_sqlsrv')->table('periode_harga')->find($id);

        return response()->json([
            'message' => 'Data periode berhasil diperbarui.',
            'data' => $updatedPeriode
        ], 200);
    }

    public function delete($id)
    {
        $periode = DB::connection('quinary_sqlsrv')->table('periode_harga')->find($id);
        if (!$periode) {
            return response()->json(['message' => 'Data periode tidak ditemukan.'], 404);
        }

        DB::connection('quinary_sqlsrv')->table('periode_harga')->where('id', $id)->delete();

        return response()->json([
            'message' => 'Data periode berhasil dihapus.'
        ], 200);
    }
}
