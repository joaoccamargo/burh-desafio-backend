<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'title',
        'description',
        'job_type',
        'salary',
        'work_hours',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function applications()
    {
        return $this->hasMany(Application::class);
    }

    public function applicants()
    {
        return $this->belongsToMany(User::class, 'applications', 'job_id', 'user_id')
            ->withTimestamps();
    }
}
