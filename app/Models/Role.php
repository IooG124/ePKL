<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    // The table associated with the model.
    protected $table = 'roles';

    // The attributes that are mass assignable.
    protected $fillable = [
        'role_name',
    ];

    // Define a relationship with the User model
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
