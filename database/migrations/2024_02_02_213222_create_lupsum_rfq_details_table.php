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
        Schema::create('lupsum_rfq_detail', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('lupsum_id');
            $table->string('description_job');
            $table->integer('qty');
            $table->string('price'); // Sesuaikan presisi dan skala sesuai kebutuhan
            $table->string('total'); // Sesuaikan presisi dan skala sesuai kebutuhan
            $table->text('description')->nullable();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lupsum_rfq_detail');
    }
};
