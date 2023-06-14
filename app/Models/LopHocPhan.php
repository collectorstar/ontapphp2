<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LopHocPhan extends Model
{
    use HasFactory;

    protected $fillable =[
        'lqlma',
        'lqlten',
        'lqlkhoahoc',
    ];
}
