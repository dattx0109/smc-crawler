<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobContactTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_contact', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('job_id');
            $table->text('job_contact_name')->nullable()->comment('Địa chỉ liên lạc của công ty để phỏng vấn');
            $table->string('job_contact_phone')->nullable()->comment('Số điện thoại liên lạc để phỏng vấn');
            $table->string('job_contact_email')->nullable()->comment('Email liên lạc phỏng vấn');
            $table->string('job_contact_description')->nullable()->comment('Mô tả về buổi phỏng vấn');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job_contact');
    }
}
