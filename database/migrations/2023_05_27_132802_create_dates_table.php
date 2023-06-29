<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatesTable extends Migration {

	public function up()
	{
		Schema::create('dates', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->datetimeTz('date');
		});
	}

	public function down()
	{
		Schema::drop('dates');
	}
}