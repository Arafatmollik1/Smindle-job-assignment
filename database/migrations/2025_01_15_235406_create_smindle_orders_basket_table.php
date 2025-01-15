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
        Schema::create('smindle_orders_basket', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id'); // Foreign key to smindle_orders table
            $table->string('name', 255);
            $table->string('type', 50);
            $table->decimal('price');
            $table->timestamps();

            $table->foreign('order_id')
                ->references('id')
                ->on('smindle_orders')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('smindle_orders_basket');
    }
};
