<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class Hobi extends Model
{
    // ⚙️Ketentuan Model dan Migrations (Database Design dan Data Modeling)
    // ✅PascalCase untuk Model dan snake_case untuk Table
    // ✅Singular(tunggal) untuk Model dan Plural untuk Table(jamak)

    // 🚀php artisan make:model User/Hobi
    protected $table = 'hobis';
    protected $fillable = ['nama'];

    public function profils()
    {
        return $this->belongsToMany(Profil::class, 'hobi_profil', 'hobi_id', 'profil_id'); // ⬅️ Hobi terhubung ke banyak Profil via tabel pivot
    }
}
