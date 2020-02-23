<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobConfigTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job-config', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('domain_id')->comment('id của domain cần config');
            $table->string('job_name')->comment('tên công việc,tiêu để công việc');
            $table->string('workplace')->nullable()->comment('nơi làm việc');
            $table->string('salary_origin')->nullable()->comment('Mức lương cứng');
            $table->string('salary_kpi')->nullable()->comment('Lương hoa hồng');
            $table->string('date_expired')->nullable()->comment('Ngày hết hạn');
            $table->string('date_publish')->nullable()->comment('Ngày đăng');
            $table->string('date_period')->nullable()->comment('Ngày hết hạn tính theo khoảng thời gian');
            $table->string('experience')->nullable()->comment('Yêu cầu kinh nghiệm làm viêc');
            $table->string('degree')->nullable()->comment('Yêu cầu bằng cấp');
            $table->string('employee_quantity')->nullable()->comment('Số lượng nhân viên cần tuyểns');
            $table->string('sex')->nullable()->comment('Yêu cầu giới tính của ứng viên');
            $table->string('age')->nullable()->comment('Yêu cầu độ tuổi của ứng viên');
            $table->string('job_description')->nullable()->comment('Mô tả công việc');
            $table->string('working_form')->nullable()->comment('Hình thức làm việc');
            $table->string('role')->nullable()->comment('Vai trò của ứng viên');
            $table->string('probationary_period')->nullable()->comment('Thời gian thử việc');
            $table->string('benefits')->nullable()->comment('Quyền lợi của ứng viên');
            $table->string('other_requirements')->nullable()->comment('Các yêu cầu khác');
            $table->string('application_type')->nullable()->comment('loại hình ứng tuyển');
            $table->string('job_contact_name')->nullable()->comment('Địa chỉ liên lạc của công ty để phỏng vấn');
            $table->string('job_contact_phone')->nullable()->comment('Số điện thoại liên lạc để phỏng vấn');
            $table->string('job_contact_email')->nullable()->comment('Email liên lạc phỏng vấn');
            $table->string('job_contact_description')->nullable()->comment('Mô tả về buổi phỏng vấn');
            $table->string('company_name')->comment('Tên của công ty');
            $table->string('company_address')->nullable()->comment('Địa chỉ của công ty');
            $table->string('company_size')->nullable()->comment('Quy mô của công ty');
            $table->string('company_description')->nullable()->comment('Mô tả về công ty');
            $table->string('company_hotline')->nullable()->comment('Số điện thoại của công ty');
            $table->string('company_website')->nullable()->comment('Website của công ty');
            $table->string('company_email')->nullable()->comment('Email của công ty');
            $table->string('company_logo')->nullable()->comment('logo công ty');
            $table->string('company_image')->nullable()->comment('hình ảnh công ty');
            $table->string('tag_name')->nullable()->comment('Tên tag');
            $table->string('link_url_test')->nullable()->comment('link url crawler test');
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
        Schema::dropIfExists('job-config');
    }
}
