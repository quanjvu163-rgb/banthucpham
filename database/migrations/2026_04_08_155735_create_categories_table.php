<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('danhmuc', function (Blueprint $table) {
            $table->integer('ID_DanhMuc', true);
            $table->string('TenDanhMuc', 20);
            $table->text('Mota');
        });
    }

    public function down()
    {
        Schema::dropIfExists('danhmuc');
    }
}
