<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentStudyingTable extends Migration {

	public function up()
	{
		Schema::create('student_studying', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('student_id')->unsigned();
			$table->integer('studying_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('student_studying');
	}
}