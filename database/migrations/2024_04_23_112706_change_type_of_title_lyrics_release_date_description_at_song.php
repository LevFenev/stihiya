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
        Schema::dropColumns("song", ["title, lyrics, release_date, release_year, credits"]);
        Schema::table('song', function(Blueprint $table){
            $table->after('artist_id', function (Blueprint $table) {
                $table->string('title', 255);
            });

            $table->after('title', function (Blueprint $table) {
                $table->text('lyrics')->nullable();
            });

            $table->after('lyrics', function (Blueprint $table) {
                $table->string('release_date',10);
            });

            $table->after('cover', function (Blueprint $table) {
                $table->text('credits')->nullable();
            });

            $table->after('credits', function (Blueprint $table) {
                $table->text('description')->nullable();
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('song', function(Blueprint $table) {
            $table->dropColumn('title');
            $table->dropColumn('lyrics');
            $table->dropColumn('release_date');
            $table->dropColumn('credits');
            $table->dropColumn('description');

            $table->integer('release_year');
        });
    }
};
