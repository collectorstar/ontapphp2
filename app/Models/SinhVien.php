<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SinhVien extends Model
{
    use HasFactory;

    protected $fillable =[
        'svma',
        'svten',
        'svngaysinh',
        'svgioitinh',
        'svquequan',
        'lqlma'
    ];

}
