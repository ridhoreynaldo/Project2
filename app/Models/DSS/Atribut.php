<?php

namespace App\Models\DSS;

use Illuminate\Database\Eloquent\Model;

class Atribut extends Model
{
    protected $connection = 'secondary_sqlsrv';
    protected $table = 'atributs';
    protected $fillable = [
        'nama',
    ];
    
    public function alternatifs()
    {
        return $this->hasMany(Alternatif::class, 'atribut_id');
    }
}