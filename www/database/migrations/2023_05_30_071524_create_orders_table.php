<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('username');
            $table->string('email');
            $table->string('nomerhp');
            $table->string('alamat');
            $table->string('rtrw');
            $table->string('kecamatan');
            $table->string('kota');
            $table->string('kodepos');
            $table->string('tanggal');
            $table->string('pembayaran')->nullable();
            $table->text('infoproduk');
            $table->string('status');
            $table->string('total_barang');
            $table->string('total_harga');
            $table->unsignedBigInteger('users_id');
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('warung_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order');
    }
};
