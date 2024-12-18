<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users'; // اسم الجدول
    protected $fillable = ['name', 'email', 'password', 'api_token'];

    // العلاقات
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_user');
    }

    public function subscriptions()
    {
        return $this->hasMany(UserSubscription::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
