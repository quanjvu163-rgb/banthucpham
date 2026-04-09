<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    public function up()
    {
        Schema::create('quanly', function (Blueprint $table) {
            $table->integer('ID_QuanLy', true);
            $table->string('TenDangNhap', 20);
            $table->string('MatKhau', 20);
            $table->string('Email', 20);
            $table->string('HoVaTen', 30);
            $table->string('DiaChi', 30);
            $table->string('SoDienThoai', 10);
            $table->date('NgayDiLam');
        });
    }

    public function down()
    {
        Schema::dropIfExists('quanly');
    }
}
