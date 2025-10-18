<?php

namespace App\Models\DSS;

use Illuminate\Database\Eloquent\Model;

class SubKriteria extends Model
{
    protected $connection = 'secondary_sqlsrv';
    protected $fillable = [
        'nama',
        'bobot',
        'kriteria_id',
    ];
    
    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class, 'kriteria_id');
    }
}
