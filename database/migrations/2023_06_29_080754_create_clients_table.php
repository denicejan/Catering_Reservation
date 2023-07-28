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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address');
            $table->string('contact');
            $table->string('email')->unique();
            $table->integer('price');
            $table->timestamps();

            $table->string('appetizers')->nullable();
            $table->string('salads')->nullable();
            $table->string('main_courses')->nullable();
            $table->string('beverages')->nullable();
            $table->string('desserts')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
