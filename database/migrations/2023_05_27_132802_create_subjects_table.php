<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubjectsTable extends Migration {

	public function up()
	{
		Schema::create('subjects', function(Blueprint $table) {
			$table->increments('id', true);
			$table->timestamps();
			$table->integer('treatment_id')->unsigned();
			$table->string('name');
			$table->string('year');
		});
	}

	public function down()
	{
		Schema::drop('subjects');
	}
}