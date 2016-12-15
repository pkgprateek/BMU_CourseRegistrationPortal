<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Role;
use App\Permission;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'email_token', 'verified'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }

    public function hasRole($role)
    {
        if(is_string($role))
        {
            return $this->roles->contains('name', $role);
        }

        // foreach ($role as $r) {
        //     if ($this->hasRole($r->name)) {
        //         return true;
        //     }
        // }
        // return false;

        return !! $role->intersect($this->roles)->count();
    }

    public function assign($role)
    {
        if (is_string($role)) 
        {
            return $this->roles()->save(
                        Role::whereName($role)->firstOrFail()
                    );
        }
        return $this->roles()->save($role);
    }

    public function verified()
    {
        $this->verified = 1;
        $this->email_token = null;
        $this->save();
    }
}
