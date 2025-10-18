<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // 🚀php artisan make:migration add_nama_to_atributs_table --table=atributs --path=database/migrations/secondary
        Schema::connection('secondary_sqlsrv')->table('atributs', function (Blueprint $table) {
            $table->integer('nama')->nullable()->default(0); // ⬅️mssql not support ->after('id')
        });
    }

    public function down(): void
    {
        Schema::connection('secondary_sqlsrv')->table('atributs', function (Blueprint $table) {
            $table->dropColumn('nama');
        });
    }
};
