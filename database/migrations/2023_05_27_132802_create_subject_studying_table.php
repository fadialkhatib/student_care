<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubjectStudyingTable extends Migration {

	public function up()
	{
		Schema::create('subject_studying', function(Blueprint $table) {
			$table->increments('id', true);
			$table->timestamps();
			$table->integer('subject_id')->unsigned();
			$table->integer('studying_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('subject_studying');
	}
}