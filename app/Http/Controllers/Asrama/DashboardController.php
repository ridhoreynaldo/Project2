<?php

namespace App\Http\Controllers\Asrama;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    protected $jenis_kelamin_lk = 'LK';
    protected $id_asset     = '2125'; //ASRAMA PUTRI
    protected $jenis_kelamin_pr = 'PR';
    protected $status_mhs_aktif = 'Aktif';
    protected $UQ = 'UQM';
    protected $UQB = 'UQB';

    public function getjumlahData()
    {
        $query = DB::connection('secondary_sqlsrv')->table('mahasiswa');
        $total = $query->count();
        $pria = DB::connection('secondary_sqlsrv')
            ->table('mahasiswa')
            ->where('JENISKELAMIN', $this -> jenis_kelamin_lk)
            ->count();

        $wanita = DB::connection('secondary_sqlsrv')
            ->table('mahasiswa')
            ->where('JENISKELAMIN', $this -> jenis_kelamin_pr)
            ->count();

        $mahasiswaAktif = DB::connection('secondary_sqlsrv')
            ->table('mahasiswa')
            ->where('STATUSMHS', $this -> status_mhs_aktif)
            ->count();

        $mahasiswaAktifWanita = DB::connection('secondary_sqlsrv')
            ->table('mahasiswa')
            ->where('STATUSMHS', $this -> status_mhs_aktif)
            ->where('JENISKELAMIN', $this -> jenis_kelamin_pr)
            ->count();
        
        $mahasiswaAktifWanitaUQ = DB::connection('secondary_sqlsrv')
            ->table('mahasiswa')
            ->where('STATUSMHS', $this -> status_mhs_aktif)
            ->where('JENISKELAMIN', $this -> jenis_kelamin_pr)
            ->where('UNIVERSITAS', $this -> UQ)
            ->count();

        $mahasiswaAktifWanitaUQB = DB::connection('secondary_sqlsrv')
            ->table('mahasiswa')
            ->where('STATUSMHS', $this -> status_mhs_aktif)
            ->where('JENISKELAMIN', $this -> jenis_kelamin_pr)
            ->where('UNIVERSITAS', $this -> UQB)
            ->count();
        
        $subAssets = DB::connection('sqlsrv')
            ->table('sub_assets')
            ->where('id_assets', $this -> id_asset) //ASRAMA PUTRI -> UQ -> Medan 
            ->count();


        $barangs = DB::connection('sqlsrv')
            ->table('barangs as b')
            ->join('orders as o', 'o.id_barang', '=', 'b.id')
            ->join('barang_label as bl', 'bl.id_orders', '=', 'o.id')
            ->where('bl.id_lokasi', $this -> id_asset)
            // ->where('bl.id_subAsset', $id_subasset) // Listing Semua Kamar
            ->select('b.id', 'b.nama', DB::raw('COUNT(o.id) as jumlah_order'))
            ->groupBy('b.id', 'b.nama')
            ->count();

        return response()->json([
            'status' => 'success',
            'data' => [
                'total mahasiswa' => $total,
                'mahasiswa pria' => $pria,
                'mahasiswa wanita' => $wanita,
                'mahasiswa aktif' => $mahasiswaAktif,
                'mahasiswa aktif wanita' => $mahasiswaAktifWanita,
                'mahasiswa aktif wanita UQ' => $mahasiswaAktifWanitaUQ,
                'mahasiswa aktif wanita UQB' => $mahasiswaAktifWanitaUQB,
                'total kamar asrama putri' => $subAssets,
                'total inventaris' => $barangs,
            ],
        ]);
    }
}
