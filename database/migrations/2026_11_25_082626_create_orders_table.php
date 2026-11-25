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
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Кто заказал
            $table->foreignId('tool_id')->constrained()->onDelete('cascade'); // Какой инструмент
            $table->string('delivery_type'); // Доставка или самовывоз
            $table->string('address')->nullable(); // Адрес доставки (если выбрана доставка)
            $table->string('status')->default('В обработке'); // Статус заказа
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
