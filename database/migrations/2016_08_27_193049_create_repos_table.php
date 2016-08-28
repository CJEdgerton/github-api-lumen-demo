<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('repos', function(Blueprint $table) {
            $table->integer('id')->unsigned();
            $table->primary('id');
            $table->string('name', 100);
            $table->string('url', 250);
            $table->date('created_date');
            $table->date('last_push_date');
            $table->text('description')->nullable();
            $table->integer('star_count');
            $table->integer('forks_count');
            $table->integer('open_issues_count');
            $table->string('homepage', 250)->nullable();
            $table->string('owner_username', 100);
            $table->string('owner_url', 250);
            $table->string('owner_avatar_url', 250);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('repos');
    }
}
