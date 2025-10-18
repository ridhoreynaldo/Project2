<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class HobiProfil extends Model
{
    protected $table = 'hobi_profil';
    protected $fillable = ['profil_id', 'hobi_id'];

    public function profil()
    {
        return $this->belongsTo(Profil::class); // ⬅️ HobbyProfile milik satu Profile
    }

    public function hobi()
    {
        return $this->belongsTo(Hobi::class); // ⬅️ HobbyProfile milik satu Hobby
    }
}
