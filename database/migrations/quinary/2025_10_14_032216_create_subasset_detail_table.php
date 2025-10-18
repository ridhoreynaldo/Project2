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
        // 🚀php artisan make:migration create_atributs_table --path=database/migrations/quinary
        // Schema::create('atributs', function (Blueprint $table) { // ⬅️If use database primary
        Schema::connection('quinary_sqlsrv')->create('subasset_detail', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_sub_assets')->nullable()->unique();
            $table->unsignedInteger('kapasitas')->default(0); // int no negative
            $table->string('ket')->nullable();
            $table->timestamps();
        });
        // 🚀php artisan migrate --path=database/migrations/quinary --database=quinary_sqlsrv

        // 🚀php artisan make:controller Asrama/PeriodeHargaController
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('quinary_sqlsrv')->dropIfExists('subasset_detail');
    }
};
