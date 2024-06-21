<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Application extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'job_id',
        'candidate',
        'phone',
        'address',
        'resume',
    ];

    public function candidate()
    {
        return $this->belongsTo(User::class, 'candidate');
    }

    public function job()
    {
        return $this->belongsTo(Job::class);
    }
}
