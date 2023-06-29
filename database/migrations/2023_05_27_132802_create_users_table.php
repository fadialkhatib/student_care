<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration {

	public function up()
	{
		Schema::create('users', function(Blueprint $table) {
			$table->increments('id', true);
			$table->timestamps();
			$table->string('name');
			$table->string('email')->unique();
			$table->string('password');
			$table->integer('phone_number')->unique();
			$table->string('role');
		});
	}

	public function down()
	{
		Schema::drop('users');
	}
}