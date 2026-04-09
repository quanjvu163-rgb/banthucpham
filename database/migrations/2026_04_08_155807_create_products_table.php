<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('sanpham', function (Blueprint $table) {
            $table->integer('ID_SanPham', true);
            $table->integer('ID_DanhMuc');
            $table->integer('ID_NhaCungCap');
            $table->string('TenSanPham', 30);
            $table->text('MoTa');
            $table->float('GiaBan');
            $table->float('SoLuong');
            $table->string('Img', 20);
            $table->string('BanChay', 10);

            $table->index('ID_NhaCungCap');
            $table->index('ID_DanhMuc');
            $table->foreign('ID_NhaCungCap')->references('ID_NCC')->on('nhacungcap');
            $table->foreign('ID_DanhMuc')->references('ID_DanhMuc')->on('danhmuc');
        });
    }

    public function down()
    {
        Schema::dropIfExists('sanpham');
    }
}
