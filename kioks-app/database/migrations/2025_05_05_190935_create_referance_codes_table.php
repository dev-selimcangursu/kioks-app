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
        Schema::create('referance_codes', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->integer('user_id');
            $table->string('customer_name');
            $table->string('customer_phone');
            $table->integer('unit_id');
            $table->integer('unit_main_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('referance_codes');
    }
};
