<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComplaintData extends Model
{
    use HasFactory;

    protected $fillable = [
        'office_id',
        'opening_balance',
        'new',
        'in_process',
        'closed',
        'closing_balance',
        'total'
    ];
}
