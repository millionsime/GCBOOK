<?php

namespace App;

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AddStud extends Model
{
    
    use SoftDeletes, Notifiable;

    protected $fillable = ['name', 'email', 'password', 'remember_token', 'role_id', 'dept_id', 'section'];

    public static function boot()
    {
        parent::boot();

        User::observe(new \App\Observers\UserActionsObserver);
    }

    /**
     * Hash password
     * @param $input
     */
    public function setPasswordAttribute($input)
    {
        if ($input) {
            $this->attributes['password'] = app('hash')->needsRehash($input) ? Hash::make($input) : $input;
        }
    }


    /**
     * Set to null if empty
     * @param $input
     */
    public function setRoleIdAttribute($input)
    {
        $this->attributes['role_id'] = $input ? $input : null;
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id')->withTrashed();
    }
    public function department()
    {
        return $this->belongsTo(Department::class, 'dept_id')->withTrashed();
    }
    public function topic()
    {
        return $this->hasMany(Topic::class, 'teacher_id')->withTrashed();
    }

    public function attendenc()
    {
        return $this->hasMany(Attendenc::class, 'student_id')->withTrashed();
    }

    public function mark()
    {
        return $this->hasMany(Mark::class, 'student_id')->withTrashed();
    }

    public function isAdmin()
    {
        foreach ($this->role()->get() as $role) {
            if ($role->id == 1 ) {
                return true;
            }
        }

        return false;
    }


    public function isStudent()
    {
        foreach ($this->role()->get() as $role) {
            if ($role->id == 2) {
                return true;
            }
        }

        return false;
    }

    public function isTeacher()
    {
        foreach ($this->role()->get() as $role) {
            if ($role->id == 3) {
                return true;
            }
        }

        return false;
    }
}