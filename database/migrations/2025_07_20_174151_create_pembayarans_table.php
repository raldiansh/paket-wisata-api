<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
public function up()
{
    Schema::create('pembayarans', function (Blueprint $table) {
        $table->id();
        $table->foreignId('pemesanan_id')->constrained()->onDelete('cascade');
        $table->string('metode_pembayaran'); // contoh: transfer bank, e-wallet, dll
        $table->string('bukti_pembayaran')->nullable(); // simpan path/file bukti
        $table->string('status')->default('menunggu'); // menunggu, diterima, ditolak
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayarans');
    }
};
