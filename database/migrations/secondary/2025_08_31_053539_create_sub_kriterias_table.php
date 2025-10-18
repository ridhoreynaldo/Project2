<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::connection('secondary_sqlsrv')->create('sub_kriterias', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->decimal('bobot', 10, 2); //->nullable() promethee ?
            $table->foreignId('kriteria_id')->constrained('kriterias')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::connection('secondary_sqlsrv')->dropIfExists('sub_kriterias');
    }
};
