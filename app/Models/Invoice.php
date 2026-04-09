<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $table = 'hoadon';
    protected $primaryKey = 'ID_HoaDon';
    public $timestamps = false;

    protected $fillable = [
        'ID_ThanhVien',
        'ThoiGianLap',
        'DiaChi',
        'GhiChu',
        'GiaTien',
        'SoDienThoai',
        'XuLy',
    ];

    protected $casts = [
        'GiaTien' => 'float',
        'XuLy' => 'integer',
    ];

    public function member()
    {
        return $this->belongsTo(Member::class, 'ID_ThanhVien', 'ID_ThanhVien');
    }
}
