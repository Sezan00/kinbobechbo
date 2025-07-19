<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Role;

class Panel extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

  
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'panel_role', 'panel_id', 'role_id');
    }

 
    // public function hasRole($roleName){  
    //     if($this->roles()->contains('name', 'Super Admin'))
    //      return true;
    //      return $this->roles()->where('name', $roleName)->exists();
    // }

        public function hasRole($roleName) {
            return $this->roles()->where('name', $roleName)->exists();
        }
        
        public function isSuperAdmin() {
            return $this->hasRole('Super Admin');
        }


        //     return $this->roles()->where('name', $roleName)->exists();
        // }
        //     public function hasRole($roleName)
        // {
        //     return $this->roles()->where('name', $roleName)->exists();
        // }
        // public function hasRole($roleName)
        // {
        //     return $this->roles()->whereRaw('LOWER(name) = ?', [strtolower($roleName)])->exists();
        // }



    public function assignRole($roleId)
    {
        $this->roles()->syncWithoutDetaching([$roleId]);
    }

    public function permissions(){
       return $this->roles->flatMap(function ($role) {
        return $role->permissions;
        })->pluck('name')->unique();
    }

    public function hasPermission($permissionName){
        return $this->roles->flatMap(function ($rule) {
                    return $rule->permissions;
                })->pluck('name')->unique()->contains($permissionName);
    }
}
