<?php

namespace App\Models\DSS;

use Illuminate\Database\Eloquent\Model;

class AlternatifKriteria extends Model
{
    protected $connection = 'secondary_sqlsrv';
    protected $fillable = [
        'alternatif_id',
        'kriteria_id',
        'bobot',
    ];

    public function alternatif()
    {
        return $this->belongsTo(Alternatif::class, 'alternatif_id');
    }
    
    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class, 'kriteria_id');
    }
}
