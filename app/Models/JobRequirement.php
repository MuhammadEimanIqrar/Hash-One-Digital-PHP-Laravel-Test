<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JobRequirement extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'job_id',
    ];

    public function job()
    {
        return $this->belongsTo(Job::class);
    }
}
