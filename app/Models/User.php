<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // Laravel assumes the table name is "users" already, so no need to set $table.
    // But if you want to be explicit:
    // protected $table = 'users';

    // If your primary key is "id", you can leave this out.
    // If it's "user_id", add:
    // protected $primaryKey = 'user_id';

    public $timestamps = false; // your table doesn’t have created_at/updated_at

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'user_id',
        'password',
        'course_type',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
}
