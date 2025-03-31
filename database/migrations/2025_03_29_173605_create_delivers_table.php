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
        Schema::create('delivers', function (Blueprint $table) {
            $table->id();
            $table->integer('document_number');
            $table->foreignId('suppliers_id')->constrained('suppliers')->cascadeOnUpdate()->cascadeOnDelete();
            $table->enum('payment_status', ['Оплачен', 'Не оплачен']);
            $table->string('comment');
            $table->foreignId('establishment_id')->constrained('establishments')->cascadeOnUpdate()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('delivers');
    }
};
