<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    const ADMIN = 'ADMIN';
    const EDITOR = 'EDITOR';
    const USER = 'USER';
    const SUPER_ADMIN = 'SUPER_ADMIN';
    const STAFF = 'STAFF';
    const ACCOUNTANT = 'ACCOUNTANT';
    const MANAGER = 'MANAGER';
    const MARKETING = 'MARKETING';
    const PARTNER = 'PARTNER';

    protected $fillable = ['name', 'slug', 'text_color', 'icon'];

    public function permissions()
    {
        return $this->belongsToMany(Permission::class, RolePermission::class, 'role_id', 'permission_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

}
