<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration {

	public function up()
	{
		Schema::create('posts', function(Blueprint $table) {
			$table->increments('id', true);
			$table->timestamps();
			$table->integer('student_id')->unsigned();
			$table->string('description');
			$table->integer('treatment_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('posts');
	}
}