<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFavoriteListsTable extends Migration {

	public function up()
	{
		Schema::create('favorite_lists', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('patient_id')->unsigned();
			$table->integer('post_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('favorite_lists');
	}
}