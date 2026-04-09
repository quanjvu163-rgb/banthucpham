<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    public function up()
    {
        Schema::create('thanhvien', function (Blueprint $table) {
            $table->integer('ID_ThanhVien', true);
            $table->string('TenDangNhap', 20);
            $table->string('MatKhau', 20);
            $table->string('Email', 50);
            $table->string('HoVaTen', 30);
            $table->string('DiaChi', 50);
            $table->string('SoDienThoai', 10);
            $table->date('NgayDangKi');
        });
    }

    public function down()
    {
        Schema::dropIfExists('thanhvien');
    }
}
