<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        //⬅️Pivot = singular_singular, Model HobiProfil
        Schema::create('hobi_profil', function (Blueprint $table) {
            $table->id();
            $table->foreignId('profil_id')->constrained('profils')->onDelete('cascade');
            $table->foreignId('hobi_id')->constrained('hobis')->onDelete('cascade'); //👉Check Box
            $table->unique(['profil_id', 'hobi_id']);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('hobi_profil');
    }
};
