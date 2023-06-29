<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration {

	public function up()
	{
		Schema::create('students', function(Blueprint $table) {
			$table->increments('id', true);
			$table->timestamps();
			$table->integer('user_id')->unsigned();
			$table->string('verification_card');
			$table->string('studying_year');
			$table->integer('university_id')->unsigned();
			$table->integer('photo_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('students');
	}
}