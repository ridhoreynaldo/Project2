<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        //⬅️Pivot = singular_singular, Model AlternatifKriteria
        Schema::connection('secondary_sqlsrv')->create('alternatif_kriteria', function (Blueprint $table) {
            $table->id();
            $table->foreignId('alternatif_id')->constrained('alternatifs')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('kriteria_id')->constrained('kriterias')->onDelete('cascade')->onUpdate('cascade');
            $table->unique(['alternatif_id', 'kriteria_id']);
            $table->decimal('bobot', 10, 2);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::connection('secondary_sqlsrv')->dropIfExists('alternatif_kriteria');
    }
};
