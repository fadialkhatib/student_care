<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportPostTable extends Migration {

	public function up()
	{
		Schema::create('report_post', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('post_id')->unsigned();
			$table->integer('report_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('report_post');
	}
}