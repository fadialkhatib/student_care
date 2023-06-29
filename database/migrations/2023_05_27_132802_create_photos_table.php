<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhotosTable extends Migration {

	public function up()
	{
		Schema::create('photos', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->longText('image');
		});
	}

	public function down()
	{
		Schema::drop('photos');
	}
}