<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUniversitiesTable extends Migration {

	public function up()
	{
		Schema::create('universities', function(Blueprint $table) {
			$table->increments('id', true);
			$table->timestamps();
			$table->string('name');
			$table->string('location');
		});
	}

	public function down()
	{
		Schema::drop('universities');
	}
}