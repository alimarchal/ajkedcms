<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

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
        'office',
        'status',
        'last_update_user_id',
    ];

    public function remarks()
    {
        return $this->hasMany(Remark::class)->orderBy('created_at', 'DESC');
    }

    protected static function booted()
    {

        if (auth()->id() == 2) {
            //
        } else {
            static::addGlobalScope('complaint', function (Builder $builder) {
                $builder->where('user_id', auth()->id());
            });
        }

    }
}
