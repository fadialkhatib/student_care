<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTreatmentPhotoTable extends Migration {

	public function up()
	{
		Schema::create('treatment_photo', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('treatment_id')->unsigned();
			$table->integer('photo_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('treatment_photo');
	}
}