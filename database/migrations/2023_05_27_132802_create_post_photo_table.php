<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostPhotoTable extends Migration {

	public function up()
	{
		Schema::create('post_photo', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('post_id')->unsigned();
			$table->integer('photo_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('post_photo');
	}
}