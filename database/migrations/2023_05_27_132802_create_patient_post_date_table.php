<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientPostDateTable extends Migration {

	public function up()
	{
		Schema::create('patient_post_date', function(Blueprint $table) {
			$table->timestamps();
			$table->increments('id');
			$table->integer('patient_id')->unsigned();
			$table->integer('post_id')->unsigned();
			$table->integer('rate');
			$table->string('approved');
			$table->integer('date_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('patient_post_date');
	}
}