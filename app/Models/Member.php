<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $table = 'thanhvien';
    protected $primaryKey = 'ID_ThanhVien';
    public $timestamps = false;

    protected $fillable = [
        'TenDangNhap',
        'MatKhau',
        'Email',
        'HoVaTen',
        'DiaChi',
        'SoDienThoai',
        'NgayDangKi',
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class, 'ID_ThanhVien', 'ID_ThanhVien');
    }

    public function invoices()
    {
        return $this->hasMany(Invoice::class, 'ID_ThanhVien', 'ID_ThanhVien');
    }
}
