<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableBlackListUrl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('list_url', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('domain_id');
            $table->string('url');
            $table->string('div');
            $table->string('format_url')->comment('Định dạng cho url');
            $table->tinyInteger('type')->comment('type = 1 neu la link bat dau, = 2 la link chan, = 3 la link chi tiet');
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
        Schema::dropIfExists('black_list_url');
    }
}
