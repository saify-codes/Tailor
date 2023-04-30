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
            $table->float('price');
            $table->text('details');
            $table->date('date')->default('current_timestamps');
            $table->enum('date',['PENDING','ON PROCESS','DELIVERED','CANCELLED']);
            $table->tinyInteger('is_assigned')->default(0);
            $table->unsignedBigInteger('user_id');

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
