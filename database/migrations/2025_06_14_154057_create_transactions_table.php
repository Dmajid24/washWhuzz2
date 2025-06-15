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
        Schema::create('transactions', function (Blueprint $table) {
            $table->char('idTransaction')->primary();
            $table->char('idUser',5);
            $table->char('idProduct',5);
            $table->date('date');
            $table->integer('total');
            $table->string('status');
        
            $table->foreign('idUser')->references('idUser')->on('users')->onDelete('cascade');
            $table->foreign('idProduct')->references('idProduct')->on('products');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
