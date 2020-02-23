<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_detail', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('job_id');
            $table->text('experience')->nullable()->comment('Yêu cầu kinh nghiệm làm viêc');
            $table->string('degree')->nullable()->comment('Yêu cầu bằng cấp');
            $table->string('employee_quantity')->nullable()->comment('Số lượng nhân viên cần tuyểns');
            $table->string('sex')->nullable()->comment('Yêu cầu giới tính của ứng viên 1: Nam || 2: Nữ || 3: Khác');
            $table->string('age')->nullable()->comment('Yêu cầu độ tuổi của ứng viên');
            $table->text('job_description')->nullable()->comment('Mô tả công việc');
            $table->string('working_form')->nullable()->comment('Hình thức làm việc 1: toàn thời gian || 2: bán thời gian');
            $table->string('role')->nullable()->comment('Vai trò của ứng viên');
            $table->string('probationary_period')->nullable()->comment('Thời gian thử việc');
            $table->text('benefits')->nullable()->comment('Quyền lợi của ứng viên');
            $table->text('other_requirements')->nullable()->comment('Các yêu cầu khác');
            $table->text('application_type')->nullable()->comment('loại hình ứng tuyển');
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
        Schema::dropIfExists('job_detail');
    }
}
