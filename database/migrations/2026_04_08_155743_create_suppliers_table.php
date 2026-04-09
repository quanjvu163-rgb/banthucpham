<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuppliersTable extends Migration
{
    public function up()
    {
        Schema::create('nhacungcap', function (Blueprint $table) {
            $table->integer('ID_NCC', true);
            $table->string('TenNCC', 20);
            $table->string('Email', 50);
            $table->string('SoDienThoai', 10);
            $table->string('DiaChi', 30);
            $table->string('Img', 20);
        });
    }

    public function down()
    {
        Schema::dropIfExists('nhacungcap');
    }
}
