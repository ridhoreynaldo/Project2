<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::connection('secondary_sqlsrv')->create('kriterias', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->enum('tipe', ['benefit', 'cost']); //👉Radio Button //->nullable() promethee ?
            $table->decimal('bobot', 10, 2); //->nullable() promethee ?
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::connection('secondary_sqlsrv')->dropIfExists('kriterias');
    }
};
