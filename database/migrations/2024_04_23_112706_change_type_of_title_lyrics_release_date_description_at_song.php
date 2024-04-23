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
        Schema::table('song', function(Blueprint $table){
            $table->dropColumn('title');
            $table->after('artist_id', function (Blueprint $table) {
                $table->string('title', 255)->nullable();
            });

            $table->dropColumn('lyrics');
            $table->after('title', function (Blueprint $table) {
                $table->text('lyrics')->nullable();
            });

            $table->dropColumn('release_date');
            $table->after('lyrics', function (Blueprint $table) {
                $table->string('release_date',10);
            });

            $table->dropColumn('release_year');

            $table->dropColumn('credits');
            $table->after('cover', function (Blueprint $table) {
                $table->text('credits')->nullable();
            });

            $table->dropColumn('description');
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
