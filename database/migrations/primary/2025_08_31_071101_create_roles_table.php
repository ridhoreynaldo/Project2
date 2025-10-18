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

        // 🚀php artisan make:migration create_roles_table --path=database/migrations/primary
        Schema::create('roles', function (Blueprint $table) { // ⬅️If use database primary
            $table->id();
            $table->string('nama')->unique();
            $table->timestamps();
        });
    }
        // 🚀php artisan migrate --path=database/migrations/primary

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roles');
    }
};
