<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQueuesTable extends Migration {

	public function up()
	{
		Schema::create('queues', function(Blueprint $table) {
			$table->increments('id', true);
			$table->timestamps();
			$table->integer('student_id')->unsigned();
			$table->string('approved');
		});
	}

	public function down()
	{
		Schema::drop('queues');
	}
}