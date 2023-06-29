<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatePostTable extends Migration {

	public function up()
	{
		Schema::create('date_post', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('date_id')->unsigned();
			$table->integer('post_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('date_post');
	}
}