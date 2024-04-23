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
            $table->after('artist_id', function (Blueprint $table) {
                $table->dropColumn('title');
                $table->string('title', 255)->nullable();
            });

            $table->after('title', function (Blueprint $table) {
                $table->dropColumn('lyrics');
                $table->text('lyrics')->nullable();
            });

            $table->after('lyrics', function (Blueprint $table) {
                $table->dropColumn('release_date');
                $table->string('release_date',10);
            });

            $table->dropColumn('release_year');

            $table->after('cover', function (Blueprint $table) {
                $table->dropColumn('credits');
                $table->text('credits')->nullable();
            });

            $table->after('credits', function (Blueprint $table) {
                $table->dropColumn('description');
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
