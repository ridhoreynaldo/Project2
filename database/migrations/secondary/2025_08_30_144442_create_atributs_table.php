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
        // ⚙️Ketentuan Model dan Migrations (Database Design dan Data Modeling)
        // ✅PascalCase untuk Model dan snake_case untuk Table
        // ✅Singular(tunggal) untuk Model dan Plural untuk Table(jamak)

        // 🚀php artisan make:migration create_atributs_table --path=database/migrations/secondary
        // Schema::create('atributs', function (Blueprint $table) { // ⬅️If use database primary
        Schema::connection('secondary_sqlsrv')->create('atributs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });
    }
        // 🚀php artisan migrate:install --database=secondary_sqlsrv
        // 🚀php artisan migrate --path=database/migrations/secondary

        // FRESH | SPECIFIC MIGRASI KEMANA (OPTIONAL)
        // 🚀php artisan migrate:fresh --database=secondary_sqlsrv --path=database/migrations/secondary
        // 🚀php artisan migrate --path=database/migrations/secondary/2025_08_31_005727_change_nama_column_in_atributs_table.php

    /**
     * Reverse the migrations.
     */
    // 🚀php artisan migrate:rollback
    public function down(): void
    {
        // Schema::dropIfExists('atributs');
        Schema::connection('secondary_sqlsrv')->dropIfExists('atributs');
    }
};
