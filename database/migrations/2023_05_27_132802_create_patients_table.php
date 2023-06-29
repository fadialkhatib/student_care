<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration {

	public function up()
	{
		Schema::create('patients', function(Blueprint $table) {
			$table->increments('id', true);
			$table->timestamps();
			$table->integer('user_id')->unsigned();
			$table->date('date_of_birth');
			$table->string('location');
		});
	}

	public function down()
	{
		Schema::drop('patients');
	}
}