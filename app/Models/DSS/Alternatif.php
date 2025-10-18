<?php

namespace App\Models\DSS;

use Illuminate\Database\Eloquent\Model;

class Alternatif extends Model
{
    // ⚙️Ketentuan Model dan Migrations (Database Design dan Data Modeling)
    // ✅PascalCase untuk Model dan snake_case untuk Table
    // ✅Singular(tunggal) untuk Model dan Plural untuk Table(jamak)

    // 🚀php artisan make:model DSS/Alternatif
    // public $timestamps = false; // ⬅️Matikan timestamps
    protected $connection = 'secondary_sqlsrv'; // Specify the connection
    protected $table = 'atributs'; // ⬅️Model Attribut maka table attributs (Optional)
    protected $fillable = [
        'nama',
        'atribut_id',
    ];

    // ⬅️hasOne / belongsTo = singular(tunggal)
    public function atribut()
    {
        return $this->belongsTo(Atribut::class, 'atribut_id'); // ⬅️Relasi many-to-one: Alternatif dimiliki oleh satu Atribut
    }

    // ⬅️hasMany / belongsToMany = plural(jamak)
    public function kriterias()
    {
        return $this->belongsToMany(Kriteria::class, 'alternatif_kriteria')
        ->withPivot(['bobot']); // ⬅️Relasi many-to-many: Alternatif terhubung ke banyak Kriteria melalui tabel pivot
    }

    public function alternatifKriterias()
    {
        return $this->hasMany(AlternatifKriteria::class, 'alternatif_id'); // ⬅️Alternatif memiliki banyak entri di tabel pivot
    }
}