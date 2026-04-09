<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    public function up()
    {
        Schema::create('hoadon', function (Blueprint $table) {
            $table->integer('ID_HoaDon', true);
            $table->integer('ID_ThanhVien');
            $table->dateTime('ThoiGianLap');
            $table->string('DiaChi', 30);
            $table->string('GhiChu', 30)->default('');
            $table->float('GiaTien');
            $table->string('SoDienThoai', 10);
            $table->tinyInteger('XuLy');

            $table->index('ID_ThanhVien');
            $table->foreign('ID_ThanhVien')->references('ID_ThanhVien')->on('thanhvien');
        });
    }

    public function down()
    {
        Schema::dropIfExists('hoadon');
    }
}
