<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;

class User extends Model
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasApiTokens,HasFactory,SoftDeletes;

    protected $fillable = [
        'avatar', 'is_active', 'name', 'email', 'password', 'address', 'contact', 'last_login_at'
    ];

    protected $dates = ['created_at', 'updated_at', 'last_login_at', 'deleted_at'];

    // Relationships
    public function members()
    {
        return $this->hasMany(Member::class);
    }

    public function tasksAssigned()
    {
        return $this->hasMany(Task::class, 'assigned_to');
    }

    public function tasksCreated()
    {
        return $this->hasMany(Task::class, 'created_by');
    }

    public function projectsCreated()
    {
        return $this->hasMany(Project::class, 'created_by');
    }
}
