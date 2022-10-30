<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leaveform extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'leavetype',
        'to_date',
        'from_date',
        'description',
        'status',
        'numDays',
        'department',
        'adminRemarks',
    ];
}
