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
        Schema::create('sub_kat_pelanggarans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_sub_kategori');
            $table->unsignedBigInteger('id_kat_pelanggaran');
            $table->timestamps();

            $table->foreign('id_kat_pelanggaran')->references('id')->on('kat_pelanggaran');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_kat_pelanggarans');
    }
};
