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
       Schema::create('pesanans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('paket_wisata_id')->constrained()->onDelete('cascade');
            $table->date('tanggal_berangkat');
            $table->integer('jumlah_orang');
            $table->decimal('total_harga', 12, 2);
            $table->enum('status', ['pending', 'dibayar', 'batal'])->default('pending');
            $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanans');
    }
};
