<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'cpf',
        'age',
    ];

    public function applications()
    {
        return $this->hasMany(Application::class);
    }

    public function jobsApplied()
    {
        return $this->belongsToMany(Job::class, 'applications', 'user_id', 'job_id')
            ->withTimestamps();
    }
}
