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
        Schema::create('rapot', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fk_user');
            $table->foreign('fk_user')->references('id')->on('users')->onDelete('cascade');
            $table->string('mk');
            $table->integer('nilai');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rapot');
    }
};
