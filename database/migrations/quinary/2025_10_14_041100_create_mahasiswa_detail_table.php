<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::connection('quinary_sqlsrv')->create('mahasiswa_detail', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('NPM'); // FK ke mahasiswa
            $table->string('emergancy_call');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('quinary_sqlsrv')->dropIfExists('mahasiswa_detail');
    }
};
