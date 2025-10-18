<?php
//✅ Controller (Service)

//── app/Services/DSS/
//   ├── AHPService.php
//   ├── ELECTREService.php
//   ├── MABACService.php
//   ├── MAUTService.php
//   ├── MOORAService.php
//   ├── PROMETHEEService.php
//   ├── SAWService.php
//   ├── SMARTService.php
//   ├── TOPSISService.php
//   ├── VIKORService.php
//   ├── WASPASService.php
//   └── WPService.php

//── app/Services/User/
//   ├── ProfileService.php
    public function createProfile(array $data, $foto = null)
    {
        if ($foto) {
            $data['foto'] = $foto->store('foto_profiles', 'public');
        }
        Profile::create($data);
    }
    public function updateProfile(Profile $profile, array $data, $foto = null)
    {
        if ($foto) {
            if ($profile->foto && Storage::disk('public')->exists($profile->foto)) {
                Storage::disk('public')->delete($profile->foto);
            }
            $data['foto'] = $foto->store('foto_profiles', 'public');
        }
        $profile->update($data);
    }
    public function deleteProfile(Profile $profile)
    {
        if ($profile->foto && Storage::disk('public')->exists($profile->foto)) {
            Storage::disk('public')->delete($profile->foto);
        }
        $profile->delete();
    }

//  ⚙️php artisan make:class Services/DSS/AHPService
namespace App\Services;

use App\Models\Kriteria;
use App\Models\Alternatif;

class AHPService
{
    public function calculate()
    {
        $kriterias = Kriteria::all();
        $alternatifs = Alternatif::with('alternatifKriteria')->get(); // ← penting!
        $rawBobot = $kriterias->pluck('bobot_kriteria')->toArray();

        // STEP 1: Pairwise Kriteria
        $pairwiseKriteria = $this->generatePairwiseFromBobot($rawBobot);
        [$bobotAHP, $normalisasiKriteria] = $this->hitungBobotAHP($pairwiseKriteria);
        [$ci, $cr] = $this->hitungKonsistensi($pairwiseKriteria, $bobotAHP);

        // STEP 2: Pairwise Alternatif per Kriteria dari DB
        $bobotAlternatif = []; // [id_kriteria][id_alternatif] = nilai
        foreach ($kriterias as $kIndex => $k) {
            $pairwiseAlt = $this->generatePairwiseAlternatif($alternatifs, $k->id);
            [$bobotA, $normalisasiA] = $this->hitungBobotAHP($pairwiseAlt);
            foreach ($alternatifs as $aIndex => $alt) {
                $bobotAlternatif[$k->id][$alt->id] = $bobotA[$aIndex];
            }
        }

        // STEP 3: Hitung Skor Akhir
        $skorAkhir = [];
        foreach ($alternatifs as $alt) {
            $skorAkhir[$alt->id] = 0;
            foreach ($kriterias as $kIndex => $k) {
                $skorAkhir[$alt->id] += $bobotAHP[$kIndex] * ($bobotAlternatif[$k->id][$alt->id] ?? 0);
            }
        }

        return view('perhitungan.ahp', compact(
            'kriterias',
            'alternatifs',
            'pairwiseKriteria',
            'normalisasiKriteria',
            'bobotAHP',
            'ci',
            'cr',
            'bobotAlternatif',
            'skorAkhir'
        ));
    }

    private function hitungBobotAHP(array $pairwise)
    {
        $n = count($pairwise);
        $totalKolom = array_fill(0, $n, 0);
        $normalisasi = [];

        for ($j = 0; $j < $n; $j++) {
            for ($i = 0; $i < $n; $i++) {
                $totalKolom[$j] += $pairwise[$i][$j];
            }
        }

        $bobot = array_fill(0, $n, 0);
        for ($i = 0; $i < $n; $i++) {
            for ($j = 0; $j < $n; $j++) {
                $normalisasi[$i][$j] = $pairwise[$i][$j] / $totalKolom[$j];
                $bobot[$i] += $normalisasi[$i][$j];
            }
            $bobot[$i] /= $n;
        }

        return [$bobot, $normalisasi];
    }

    private function hitungKonsistensi(array $pairwise, array $bobot)
    {
        $n = count($bobot);
        $lamdaMax = 0;

        for ($i = 0; $i < $n; $i++) {
            $total = 0;
            for ($j = 0; $j < $n; $j++) {
                $total += $pairwise[$i][$j] * $bobot[$j];
            }
            $lamdaMax += $total / $bobot[$i];
        }

        $lamdaMax /= $n;
        $ci = ($lamdaMax - $n) / ($n - 1);
        $riList = [0, 0, 0.58, 0.9, 1.12, 1.24, 1.32, 1.41, 1.45, 1.49];
        $ri = $riList[$n] ?? 1.49;
        $cr = $ri ? $ci / $ri : 0;

        return [round($ci, 4), round($cr, 4)];
    }

    private function generatePairwiseFromBobot(array $bobotArray)
    {
        $n = count($bobotArray);
        $matrix = [];

        for ($i = 0; $i < $n; $i++) {
            for ($j = 0; $j < $n; $j++) {
                $matrix[$i][$j] = ($i == $j) ? 1 : $bobotArray[$i] / $bobotArray[$j];
            }
        }

        return $matrix;
    }

    private function generatePairwiseAlternatif($alternatifs, $id_kriteria)
    {
        $bobot = [];
        foreach ($alternatifs as $alt) {
            $nilai = $alt->alternatifKriteria->firstWhere('id_kriteria', $id_kriteria)?->bobot_alternatif ?? 1;
            $bobot[] = $nilai;
        }

        $n = count($bobot);
        $matrix = [];
        for ($i = 0; $i < $n; $i++) {
            for ($j = 0; $j < $n; $j++) {
                $matrix[$i][$j] = ($bobot[$j] != 0) ? $bobot[$i] / $bobot[$j] : 0;
            }
        }

        return $matrix;
    }
}
