<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('company_id');
            $table->integer('domain_id');
            $table->string('job_name')->comment('Tên của job');
            $table->string('workplace')->nullable()->comment('Địa điểm làm việc');
            $table->string('salary_origin')->nullable()->comment('Mức lương cứng');
            $table->string('salary_kpi')->nullable()->comment('Lương hoa hồng');
            $table->string('date_expired')->nullable()->comment('Ngày hết hạn');
            $table->string('date_publish')->nullable()->comment('Ngày đăng');
            $table->string('date_period')->nullable()->comment('Ngày hết hạn tính theo khoảng thời gian');
            $table->integer('status')->nullable()->comment('1: thành công || 2: Thất bại');
            $table->integer('status_convert')->nullable()->comment('1: convert || 2: chưa convert|| 3: update');
            $table->string('link_crawler')->nullable()->comment('Link mà crawler được để ra dữ liệu');
            $table->string('report_total')->nullable()->comment('thong ke bao nhieu truong hop le');

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
        Schema::dropIfExists('jobs');
    }
}
