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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('transaction_id')->unique();
            $table->integer('customer_id');
            $table->string('name');
            $table->string('email');
            $table->string('address');
            $table->string('phone')->nullable();
            $table->double('total_price');
            $table->double('discount')->default(0); // New discount column
            $table->string('payment_method');
            $table->string('payment_status')->default('pending');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
