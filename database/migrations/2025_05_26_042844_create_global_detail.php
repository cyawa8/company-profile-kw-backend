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
        Schema::create('global_detail', function (Blueprint $table) {
            $table->id();
            $table->foreignId('global_category_id')->constrained('global_category')->onDelete('cascade');
            $table->text('description');
            $table->integer('started');
            $table->integer('employees');
            $table->integer('assets');
            $table->integer('costumers');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('global_detail');
    }
};
