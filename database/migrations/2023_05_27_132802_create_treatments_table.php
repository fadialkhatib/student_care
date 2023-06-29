<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTreatmentsTable extends Migration {

	public function up()
	{
		Schema::create('treatments', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name');
			$table->string('description');
			$table->string('self_diagnosed');
		});
	}

	public function down()
	{
		Schema::drop('treatments');
	}
}