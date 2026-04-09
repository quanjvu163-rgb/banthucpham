<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    public function up()
    {
        Schema::create('binhluan', function (Blueprint $table) {
            $table->integer('ID_BinhLuan', true);
            $table->integer('ID_ThanhVien');
            $table->integer('ID_SanPham');
            $table->string('NoiDung', 100);
            $table->dateTime('ThoiGianBinhLuan');

            $table->index('ID_ThanhVien');
            $table->index('ID_SanPham');
            $table->foreign('ID_ThanhVien')->references('ID_ThanhVien')->on('thanhvien');
            $table->foreign('ID_SanPham')->references('ID_SanPham')->on('sanpham');
        });
    }

    public function down()
    {
        Schema::dropIfExists('binhluan');
    }
}
