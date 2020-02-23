<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobConfigDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_config_detail', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('date_start')->nullable();
            $table->string('period')->nullable();
            $table->string('date_end')->nullable();
            $table->integer('domain_id');
            $table->tinyInteger('status')->comment('tình trạng bật tắt crawl:1 là bật 2 là tắt');
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
        Schema::dropIfExists('job_config_detail');
    }
}
