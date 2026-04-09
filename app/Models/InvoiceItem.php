<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceItem extends Model
{
    use HasFactory;

    protected $table = 'chitiethoadon';
    public $timestamps = false;
    public $incrementing = false;
    protected $primaryKey = null;

    protected $fillable = [
        'ID_HoaDon',
        'ID_ThanhVien',
        'ID_SanPham',
        'TenSanPham',
        'GiaBan',
        'SoLuong',
    ];
}
