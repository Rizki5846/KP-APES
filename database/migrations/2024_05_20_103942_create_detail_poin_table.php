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
        Schema::create('detail_poin', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->unsignedBigInteger('nis');
            $table->unsignedBigInteger('id_pelanggaran');
            $table->string('ket');
            $table->timestamps();

            $table->foreign('nis')->references('nis')->on('siswas');
            $table->foreign('id_pelanggaran')->references('id')->on('pelanggarans');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_poin');
    }
};
