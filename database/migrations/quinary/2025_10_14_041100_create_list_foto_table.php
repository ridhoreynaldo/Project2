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
        Schema::connection('quinary_sqlsrv')->create('list_foto', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_sub_assets'); // FK ke subasset
            $table->string('foto');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('quinary_sqlsrv')->dropIfExists('list_foto');
    }
};
