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
        Schema::create('payir_settings', function (Blueprint $table) {
            $table->id();
            $table->boolean('status');
            $table->string('country_name');
            $table->string('currency_name');
            $table->double('currency_rate');
            $table->text('payir_api_key');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payir_settings');
    }
};
