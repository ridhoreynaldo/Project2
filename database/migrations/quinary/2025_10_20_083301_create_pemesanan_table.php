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
        Schema::connection('quinary_sqlsrv')->create('pemesanan', function (Blueprint $table) {
            $table->id();
            $table->string('npm'); // ID mahasiswa / user
            $table->string('id_sub_asset'); // kode kamar (misal d1-101)
            $table->date('tgl_pesan')->useCurrent(); // tanggal pemesanan (default now)
            $table->date('tgl_masuk')->nullable();
            $table->date('tgl_keluar')->nullable();
            $table->decimal('total_bayar', 12, 2)->default(0);
            $table->enum('status', ['terkonfirmasi', 'menunggu pembayaran', 'dibatalkan'])
                  ->default('menunggu pembayaran');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('quinary_sqlsrv')->dropIfExists('pemesanan');
    }
};
