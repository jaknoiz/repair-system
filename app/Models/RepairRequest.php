<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RepairRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'issue',
        'campus',
        'reporter',
        'internal_phone',
        'external_phone',
        'remarks',
    ];
}
