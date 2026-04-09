<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'danhmuc';
    protected $primaryKey = 'ID_DanhMuc';
    public $timestamps = false;

    protected $fillable = [
        'TenDanhMuc',
        'Mota',
    ];

    public function products()
    {
        return $this->hasMany(Product::class, 'ID_DanhMuc', 'ID_DanhMuc');
    }
}
