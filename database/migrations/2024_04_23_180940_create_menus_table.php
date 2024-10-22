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
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('categoryid');
            $table->integer('price')->nullable();
            $table->integer('previousprice')->nullable();
            $table->string('description')->nullable();
            $table->string('status')->nullable();
            $table->string('quantity')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};
