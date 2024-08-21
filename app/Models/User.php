<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'phone',
        'zip',
        'country_id',
        'created',
        'last_login',
        'status',
        'is_active',
        'ip',
    ];

    public static $rules = [
        'role_id' => ['required', 'numeric'],
        'email' => ['required', 'email', 'unique:users'],
        'password' => ['required'],
        'status' => ['required']
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'created' => 'datetime'
    ];

    public function spaces() {
        return $this -> belongsToMany(Space::class, 'spaces_users', 'user_id', 'space_id');
    }

    public function role() {
        return $this -> belongsTo(Role::class, 'role_id');
    }

    public function hasRole($roleName) {
        $roles = [
            'Admin' => 3,
            'Assistant' => 2,
            'User' => 1
        ];

        $userRole = $this->role->role;
        #debug userrole
        #dd($userRole);
        // Verifica si el rol del usuario es mayor o igual al rol requerido en la jerarquía
        return isset($roles[$userRole]) && $roles[$userRole] >= $roles[$roleName];
    }
}
