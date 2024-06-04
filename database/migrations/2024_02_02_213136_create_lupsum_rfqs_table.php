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
        Schema::create('lupsum_rfq', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('number_cr');
            $table->string('job');
            $table->string('offer_number');
            $table->string('include_tax');
            $table->string('total_price'); // Sesuaikan presisi dan skala sesuai kebutuhan
            $table->string('responsible');
            $table->string('company');
            $table->string('name_hod');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lupsum_rfq');
    }
};
