<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_resi extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'invoice',
        'awb',
        'logistic',
        'warehouse',
        'status',
    ];
}
