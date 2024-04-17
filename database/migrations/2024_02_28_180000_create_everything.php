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
        /*Schema::create('user', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('name');
            $table->string('username');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken()->nullable();
            $table->text('bio')->nullable();
            $table->string('avatar')->nullable();

            $table->integer('status');
            $table->timestamp('deleted_at')->nullable();
        });

        // оно надо же?
        Schema::create('user_role', function (Blueprint $table) {

        });

        Schema::create('poem', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->id('author_id');
            $table->id('publisher_id');
            $table->datetime('release_date');
            $table->string('title');
            $table->text('content');
            $table->text('storyline')->nullable(); // инфа от автора или редактора
            $table->string('video')->nullable(); //link
            $table->string('photo')->nullable(); //link
            $table->string('cover')->nullable(); //link
            $table->boolean('is_listenable');

            $table->string('status');
            $table->timestamp('deleted_at')->nullable();
        });

        Schema::create('collection', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->id('author_id');
            $table->datetime('release_date');
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('cover')->nullable(); //link
            $table->boolean('is_listenable');

            $table->string('status');
            $table->timestamp('deleted_at')->nullable();
        });

        Schema::create('poem_collection', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->id('poem_id');
            $table->id('collection_id');
        });

        Schema::create('song', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->id('artist_id');
            //$table->id('publisher_id');
            $table->datetime('release_date');
            $table->string('title');
            $table->text('lyrics');
            $table->text('storyline')->nullable(); // например, когда вышел сингл
            $table->string('video')->nullable(); //link
            //$table->string('photo')->nullable(); //link
            $table->string('cover')->nullable(); //link
            //$table->boolean('is_listenable');

            $table->string('status');
            $table->timestamp('deleted_at')->nullable();
        });

        Schema::create('album', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->id('artist_id');
            $table->datetime('release_date');
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('cover')->nullable(); //link
            //$table->boolean('is_listenable');

            $table->string('status');
            $table->timestamp('deleted_at')->nullable();
        });

        Schema::create('song_album', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->id('song_id');
            $table->id('album_id');
        });

        Schema::create('recording', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->id('record_user');
            $table->string('record_link');
            $table->string('title');
            $table->time('duration');
            $table->string('cover');

            $table->string('status');
            $table->timestamp('deleted_at')->nullable();
        });

        Schema::create('comment', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->id('user_id');
            $table->id('poem_id')->nullable();
            $table->id('collection_id')->nullable();
            $table->id('song_id')->nullable();
            $table->id('album_id')->nullable();
            $table->text('content');
            $table->integer('like_count')->nullable();
            $table->integer('dislike_count')->nullable();

            $table->string('status'); // new удаляются каждый день
            $table->timestamp('deleted_at')->nullable();
        });

        Schema::create('status', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('status_name');
        });*/
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('poem', function(Blueprint $table) {
            $table->dropColumn('user');
            $table->dropColumn('role');
            $table->dropColumn('poem');
            $table->dropColumn('collection');
            $table->dropColumn('poem_collection');
            $table->dropColumn('song');
            $table->dropColumn('album');
            $table->dropColumn('song_album');
            $table->dropColumn('recording');
            $table->dropColumn('comment');
            $table->dropColumn('status');
        });
    }
};
