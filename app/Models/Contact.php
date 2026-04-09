<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $table = 'lienhe';
    protected $primaryKey = 'ID_LienHe';
    public $timestamps = false;

    protected $fillable = [
        'ID_ThanhVien',
        'TenThanhVien',
        'Email',
        'NoiDung',
        'ThoiGianLienHe',
    ];

    public function member()
    {
        return $this->belongsTo(Member::class, 'ID_ThanhVien', 'ID_ThanhVien');
    }
}
