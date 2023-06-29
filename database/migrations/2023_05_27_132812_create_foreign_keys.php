<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('patients', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('students', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('cascade')
						->onUpdate('restrict');
		});
		Schema::table('students', function(Blueprint $table) {
			$table->foreign('university_id')->references('id')->on('universities')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('students', function(Blueprint $table) {
			$table->foreign('photo_id')->references('id')->on('photos')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('posts', function(Blueprint $table) {
			$table->foreign('student_id')->references('id')->on('students')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('posts', function(Blueprint $table) {
			$table->foreign('treatment_id')->references('id')->on('treatments')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('subjects', function(Blueprint $table) {
			$table->foreign('treatment_id')->references('id')->on('treatments')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('patient_post_date', function(Blueprint $table) {
			$table->foreign('patient_id')->references('id')->on('patients')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('patient_post_date', function(Blueprint $table) {
			$table->foreign('post_id')->references('id')->on('posts')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('patient_post_date', function(Blueprint $table) {
			$table->foreign('date')->references('id')->on('dates')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('date_post', function(Blueprint $table) {
			$table->foreign('date_id')->references('id')->on('dates')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('date_post', function(Blueprint $table) {
			$table->foreign('post_id')->references('id')->on('posts')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('post_photo', function(Blueprint $table) {
			$table->foreign('post_id')->references('id')->on('posts')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('post_photo', function(Blueprint $table) {
			$table->foreign('photo_id')->references('id')->on('photos')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('treatment_photo', function(Blueprint $table) {
			$table->foreign('treatment_id')->references('id')->on('treatments')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('treatment_photo', function(Blueprint $table) {
			$table->foreign('photo_id')->references('id')->on('photos')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('university_subject', function(Blueprint $table) {
			$table->foreign('university_id')->references('id')->on('universities')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('university_subject', function(Blueprint $table) {
			$table->foreign('subject_id')->references('id')->on('subjects')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('subject_studying', function(Blueprint $table) {
			$table->foreign('subject_id')->references('id')->on('subjects')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('subject_studying', function(Blueprint $table) {
			$table->foreign('studying_id')->references('id')->on('studying')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('student_studying', function(Blueprint $table) {
			$table->foreign('student_id')->references('id')->on('students')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('student_studying', function(Blueprint $table) {
			$table->foreign('studying_id')->references('id')->on('studying')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('queues', function(Blueprint $table) {
			$table->foreign('student_id')->references('id')->on('students')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('report_post', function(Blueprint $table) {
			$table->foreign('post_id')->references('id')->on('posts')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('report_post', function(Blueprint $table) {
			$table->foreign('report_id')->references('id')->on('reports')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('favorite_lists', function(Blueprint $table) {
			$table->foreign('patient_id')->references('id')->on('patients')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('favorite_lists', function(Blueprint $table) {
			$table->foreign('post_id')->references('id')->on('posts')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
	}

	public function down()
	{
		Schema::table('patients', function(Blueprint $table) {
			$table->dropForeign('patients_user_id_foreign');
		});
		Schema::table('students', function(Blueprint $table) {
			$table->dropForeign('students_user_id_foreign');
		});
		Schema::table('students', function(Blueprint $table) {
			$table->dropForeign('students_university_id_foreign');
		});
		Schema::table('students', function(Blueprint $table) {
			$table->dropForeign('students_photo_id_foreign');
		});
		Schema::table('posts', function(Blueprint $table) {
			$table->dropForeign('posts_student_id_foreign');
		});
		Schema::table('posts', function(Blueprint $table) {
			$table->dropForeign('posts_treatment_id_foreign');
		});
		Schema::table('subjects', function(Blueprint $table) {
			$table->dropForeign('subjects_treatment_id_foreign');
		});
		Schema::table('patient_post_date', function(Blueprint $table) {
			$table->dropForeign('patient_post_date_patient_id_foreign');
		});
		Schema::table('patient_post_date', function(Blueprint $table) {
			$table->dropForeign('patient_post_date_post_id_foreign');
		});
		Schema::table('patient_post_date', function(Blueprint $table) {
			$table->dropForeign('patient_post_date_date_foreign');
		});
		Schema::table('date_post', function(Blueprint $table) {
			$table->dropForeign('date_post_date_id_foreign');
		});
		Schema::table('date_post', function(Blueprint $table) {
			$table->dropForeign('date_post_post_id_foreign');
		});
		Schema::table('post_photo', function(Blueprint $table) {
			$table->dropForeign('post_photo_post_id_foreign');
		});
		Schema::table('post_photo', function(Blueprint $table) {
			$table->dropForeign('post_photo_photo_id_foreign');
		});
		Schema::table('treatment_photo', function(Blueprint $table) {
			$table->dropForeign('treatment_photo_treatment_id_foreign');
		});
		Schema::table('treatment_photo', function(Blueprint $table) {
			$table->dropForeign('treatment_photo_photo_id_foreign');
		});
		Schema::table('university_subject', function(Blueprint $table) {
			$table->dropForeign('university_subject_university_id_foreign');
		});
		Schema::table('university_subject', function(Blueprint $table) {
			$table->dropForeign('university_subject_subject_id_foreign');
		});
		Schema::table('subject_studying', function(Blueprint $table) {
			$table->dropForeign('subject_studying_subject_id_foreign');
		});
		Schema::table('subject_studying', function(Blueprint $table) {
			$table->dropForeign('subject_studying_studying_id_foreign');
		});
		Schema::table('student_studying', function(Blueprint $table) {
			$table->dropForeign('student_studying_student_id_foreign');
		});
		Schema::table('student_studying', function(Blueprint $table) {
			$table->dropForeign('student_studying_studying_id_foreign');
		});
		Schema::table('queues', function(Blueprint $table) {
			$table->dropForeign('queues_student_id_foreign');
		});
		Schema::table('report_post', function(Blueprint $table) {
			$table->dropForeign('report_post_post_id_foreign');
		});
		Schema::table('report_post', function(Blueprint $table) {
			$table->dropForeign('report_post_report_id_foreign');
		});
		Schema::table('favorite_lists', function(Blueprint $table) {
			$table->dropForeign('favorite_lists_patient_id_foreign');
		});
		Schema::table('favorite_lists', function(Blueprint $table) {
			$table->dropForeign('favorite_lists_post_id_foreign');
		});
	}
}