<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Job extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'company_detail',
        'posted_by',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'posted_by');
    }

    public function requirements()
    {
        return $this->hasMany(JobRequirement::class);
    }

    public function applications()
    {
        return $this->hasMany(Application::class);
    }
}
