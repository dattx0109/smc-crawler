<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->comment('Tên hiển thị người crawl');
            $table->string('email')->comment('email đăng nhập');
            $table->string('password')->comment('Mật khẩu đăng nhập,tối thiểu 6 kí tự,tối đa 30 kí tự');
            $table->tinyInteger('level')->comment('cấp độ người dùng crawl,admin:1 và thường:2');
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
        Schema::dropIfExists('users');
    }
}
