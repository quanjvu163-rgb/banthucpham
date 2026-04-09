<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'sanpham';
    protected $primaryKey = 'ID_SanPham';
    public $timestamps = false;

    protected $fillable = [
        'ID_DanhMuc',
        'ID_NhaCungCap',
        'TenSanPham',
        'MoTa',
        'GiaBan',
        'SoLuong',
        'Img',
        'BanChay',
    ];

    protected $casts = [
        'GiaBan' => 'float',
        'SoLuong' => 'float',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'ID_DanhMuc', 'ID_DanhMuc');
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'ID_NhaCungCap', 'ID_NCC');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'ID_SanPham', 'ID_SanPham')->orderByDesc('ThoiGianBinhLuan');
    }
}
