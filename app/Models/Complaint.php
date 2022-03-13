<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    use HasFactory;

    protected $fillable = [
        'complaint_date',
        'office_id',
        'user_id',
        'subject',
        'description',
        'category',
        'district',
        'source',
        'source_details',
        'file_attachments',
        'name',
        'father_husband',
        'gender',
        'cnic',
        'cell_number',
        'phone_number',
        'address',
        'status',
    ];

    public function remarks()
    {
        return $this->hasMany(Remark::class)->orderBy('created_at', 'DESC');
    }
}
