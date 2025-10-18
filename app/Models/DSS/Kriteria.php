<?php

namespace App\Models\DSS;

use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    protected $connection = 'secondary_sqlsrv';
    protected $table = 'kriterias';
    protected $fillable = [
        'nama',
        'tipe',
        'bobot',
    ];

    public function subKriterias()
    {
        return $this->hasMany(SubKriteria::class, 'kriteria_id');
    }

    public function alternatifs()
    {
        return $this->belongsToMany(Alternatif::class, 'alternatif_kriteria')->withPivot('bobot');
    }

    public function alternatifKriterias()
    {
        return $this->hasMany(AlternatifKriteria::class, 'kriteria_id');
    }
}
