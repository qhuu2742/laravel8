<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiemThi extends Model
{
    protected $fillable = [
        'SBD',
        'ten',
        'ngay_sinh',
        'toan',
        'van',
        'ly',
        'hoa',
        'sinh',
        'KHTN',
        'lich_su',
        'dia_ly',
        'GDCD',
        'KHXH',
        'ngoai_ngu',
    ];
}
