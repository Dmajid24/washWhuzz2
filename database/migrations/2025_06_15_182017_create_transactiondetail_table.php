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
        Schema::create('transactiondetail', function (Blueprint $table) {
            $table->id();
            $table->char('idTransaction', 10);
            $table->char('idProduct', 5);
            $table->integer('quantity');
            $table->integer('price'); // harga per item saat transaksi
            $table->foreign('idTransaction')->references('idTransaction')->on('transactions')->onDelete('cascade');
            $table->foreign('idProduct')->references('idProduct')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactiondetail');
    }
};
