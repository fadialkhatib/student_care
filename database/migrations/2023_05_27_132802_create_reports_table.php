<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportsTable extends Migration {

	public function up()
	{
		Schema::create('reports', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('report');
		});
	}

	public function down()
	{
		Schema::drop('reports');
	}
}