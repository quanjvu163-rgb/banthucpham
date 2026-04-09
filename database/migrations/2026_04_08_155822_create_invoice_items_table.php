<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceItemsTable extends Migration
{
    public function up()
    {
        Schema::create('chitiethoadon', function (Blueprint $table) {
            $table->integer('ID_HoaDon');
            $table->integer('ID_ThanhVien');
            $table->integer('ID_SanPham');
            $table->string('TenSanPham', 30);
            $table->float('GiaBan');
            $table->integer('SoLuong');

            $table->primary(['ID_HoaDon', 'ID_ThanhVien', 'ID_SanPham']);
            $table->index('ID_HoaDon');
            $table->index('ID_ThanhVien');
            $table->index('ID_SanPham');
            $table->foreign('ID_HoaDon')->references('ID_HoaDon')->on('hoadon');
            $table->foreign('ID_ThanhVien')->references('ID_ThanhVien')->on('thanhvien');
            $table->foreign('ID_SanPham')->references('ID_SanPham')->on('sanpham');
        });
    }

    public function down()
    {
        Schema::dropIfExists('chitiethoadon');
    }
}
