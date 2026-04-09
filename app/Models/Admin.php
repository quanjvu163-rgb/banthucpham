<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $table = 'quanly';
    protected $primaryKey = 'ID_QuanLy';
    public $timestamps = false;

    protected $fillable = [
        'TenDangNhap',
        'MatKhau',
        'Email',
        'HoVaTen',
        'DiaChi',
        'SoDienThoai',
        'NgayDiLam',
    ];
}
