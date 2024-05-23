<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    const PREMIUM_THRESHOLD = 1000000000;

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reaction', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
        });

        Schema::create('comment', function (Blueprint $table) {
            $table->dropColumn('like_count');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reaction');
        Schema::create('comment', function (Blueprint $table) {
            $table->integer('like_count');
        });
    }
};
