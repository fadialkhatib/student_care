<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUniversitySubjectTable extends Migration {

	public function up()
	{
		Schema::create('university_subject', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('university_id')->unsigned();
			$table->integer('subject_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('university_subject');
	}
}