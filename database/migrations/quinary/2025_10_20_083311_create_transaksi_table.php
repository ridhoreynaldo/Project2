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
        Schema::connection('quinary_sqlsrv')->create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_pemesanan')
                  ->constrained('pemesanan')
                  ->onDelete('cascade'); // hapus transaksi kalau pemesanan dihapus
            $table->date('tgl_bayar')->useCurrent();
            $table->decimal('jlh_bayar', 12, 2)->default(0);
            $table->string('metode_bayar', 50)->nullable(); // contoh: dana, briva, mandiri
            $table->enum('status', ['pending', 'gagal', 'sukses'])
                  ->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('quinary_sqlsrv')->dropIfExists('transaksi');
    }
};
