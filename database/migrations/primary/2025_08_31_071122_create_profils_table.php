<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('profils', function (Blueprint $table) {
            $table->id();
            $table->enum('jenis_kelamin', ['pria', 'wanita'])->nullable();
            $table->date('birth_date')->nullable(); //👉Date Picker
            $table->string('phone_number')->nullable();
            $table->text('alamat')->nullable();
            $table->string('foto')->nullable(); //👉File Upload
            $table->foreignId('pengguna_id')->constrained('penggunas')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('profils');
    }
};
