<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('company_name')->comment('Tên của công ty');
            $table->text('company_address')->nullable()->comment('Địa chỉ của công ty');
            $table->string('company_size')->nullable()->comment('Quy mô của công ty');
            $table->string('company_description')->nullable()->comment('Mô tả về công ty');
            $table->string('company_hotline')->nullable()->comment('Số điện thoại của công ty');
            $table->string('company_website')->nullable()->comment('Website của công ty');
            $table->string('company_email')->nullable()->comment('Email của công ty');
            $table->string('company_logo')->nullable()->comment('logo công ty');
            $table->string('company_image')->nullable()->comment('hình ảnh công ty');
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
        Schema::dropIfExists('companies');
    }
}
