<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudyingTable extends Migration {

	public function up()
	{
		Schema::create('studying', function(Blueprint $table) {
			$table->increments('id', true);
			$table->timestamps();
			$table->integer('year');
			$table->integer('semister');
		});
	}

	public function down()
	{
		Schema::drop('studying');
	}
}