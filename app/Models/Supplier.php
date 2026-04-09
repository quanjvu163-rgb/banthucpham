<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $table = 'nhacungcap';
    protected $primaryKey = 'ID_NCC';
    public $timestamps = false;

    protected $fillable = [
        'TenNCC',
        'Email',
        'SoDienThoai',
        'DiaChi',
        'Img',
    ];

    public function products()
    {
        return $this->hasMany(Product::class, 'ID_NhaCungCap', 'ID_NCC');
    }
}
