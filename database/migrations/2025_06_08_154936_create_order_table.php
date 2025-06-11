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
        Schema::create('order', function (Blueprint $table) {
            $table->id('orderID');
            $table->id('userID'); // Assuming this is a foreign key to the users table
            $table->id('productID'); // Assuming this is a foreign key to the products table
            $table->date('date'); // Assuming this is the order date
            $table->integer('total'); // Assuming this is the total amount for the order
            $table->string('status')->default('pending'); // Default status of the order
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order');
    }
};
