<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // 🚀composer require doctrine/dbal
        // 🚀php artisan make:migration change_nama_column_in_atributs_table --table=atributs --path=database/migrations/secondary
        Schema::connection('secondary_sqlsrv')->table('atributs', function (Blueprint $table) {
            $table->string('nama')->nullable()->change();//👉TextField
        });
    }
       
    public function down(): void
    {
        Schema::connection('secondary_sqlsrv')->table('atributs', function (Blueprint $table) {
            $table->string('nama')->nullable()->change();
        });
    }
};
