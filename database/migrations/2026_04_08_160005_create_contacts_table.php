<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    public function up()
    {
        Schema::create('lienhe', function (Blueprint $table) {
            $table->integer('ID_LienHe', true);
            $table->integer('ID_ThanhVien');
            $table->string('TenThanhVien', 50);
            $table->string('Email', 50);
            $table->text('NoiDung');
            $table->dateTime('ThoiGianLienHe');

            $table->index('ID_ThanhVien');
            $table->foreign('ID_ThanhVien')->references('ID_ThanhVien')->on('thanhvien');
        });
    }

    public function down()
    {
        Schema::dropIfExists('lienhe');
    }
}
