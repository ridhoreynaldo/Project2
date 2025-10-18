<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\Hash;

class Pengguna extends Model
{
    use HasFactory; //⬅️ Factory, Dummy, Seeder
    // public $timestamps = false;

    protected $table = 'penggunas';
    protected $fillable = [
        'nama',
        'email',
        'password',
        'role_id',
    ];

    // 🔒 Supaya password gak pernah keluar ke API/JSON
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // 🛠️ Mutator: otomatis hash password saat set
    protected function password(): Attribute
    {
        return Attribute::make(
            set: fn(string $value) => Hash::make($value),
        );
    }

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id'); // ⬅️Pengguna memiliki satu Role
    }

    public function profil()
    {
        return $this->hasOne(Profil::class, 'pengguna_id'); // ⬅️Pengguna memiliki satu Profil
    }
}