<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    protected $table = 'profils';
    protected $fillable = [
        'user_id',
        'jenis_kelamin',
        'birth_date',
        'phone_number',
        'alamat',
        'foto',
    ];
  
    public function pengguna()
    {
        return $this->belongsTo(Pengguna::class); //⬅️ Profile dimiliki oleh satu Pengguna
    }

    public function hobis()
    {
        return $this->belongsToMany(Hobi::class, 'hobi_profil', 'profil_id', 'hobi_id'); // ⬅️ Profil terhubung ke banyak Hobi via tabel pivot
    }
}
