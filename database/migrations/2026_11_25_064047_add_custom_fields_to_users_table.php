<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Добавляем новые поля. 'name' можно оставить, он не помешает.
            $table->string('login')->unique()->nullable()->after('name');
            $table->string('full_name')->nullable()->after('login');
            $table->string('phone')->nullable()->after('full_name');
            $table->string('address')->nullable()->after('phone');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['login', 'full_name', 'phone', 'address']);
        });
    }
};