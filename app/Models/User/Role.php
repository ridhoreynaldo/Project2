<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';
    protected $fillable = [
        'nama',
    ];

    public function users()
    {
        return $this->hasMany(Pengguna::class, 'role_id'); //⬅️ Role memiliki banyak User
    }
}