<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Untuk informasi data karyawan (termasuk leadership dan testimonial)
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('about_people', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->date('birth_date');
            $table->string('job');
            $table->text('description');
            $table->string('contact', 50);
            $table->text('about');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_people');
    }
};
