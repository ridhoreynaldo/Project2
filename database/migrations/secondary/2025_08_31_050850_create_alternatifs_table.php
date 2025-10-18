<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::connection('secondary_sqlsrv')->create('alternatifs', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->foreignId('atribut_id')->constrained('atributs')->onDelete('cascade')->onUpdate('cascade'); //👉Dropdown
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::connection('secondary_sqlsrv')->dropIfExists('alternatifs');
    }
};
