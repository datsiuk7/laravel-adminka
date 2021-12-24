<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string("name");


            $table->bigInteger('user_id')->unsigned()->index()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');


            $table->string("slug")->nullable()->unique();
            $table->string("icon")->nullable()->default("far fa-");
            $table->longText("body")->nullable();
            $table->integer("year_old")->nullable();
            $table->timestamp("birthday_at")->nullable();
            $table->integer('sort_order')->nullable();
            $table->timestamps();
        });

        DB::statement('UPDATE profiles SET sort_order = id');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}
