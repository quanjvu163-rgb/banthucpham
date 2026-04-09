<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'binhluan';
    protected $primaryKey = 'ID_BinhLuan';
    public $timestamps = false;

    protected $fillable = [
        'ID_ThanhVien',
        'ID_SanPham',
        'NoiDung',
        'ThoiGianBinhLuan',
    ];

    public function member()
    {
        return $this->belongsTo(Member::class, 'ID_ThanhVien', 'ID_ThanhVien');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'ID_SanPham', 'ID_SanPham');
    }
}
