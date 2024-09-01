<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory;

    
        protected $table = 'login_users'; 
        protected $fillable = [
            'fname',
            'lname',
            'gender',
            'email',
            'password',
            'phonenumber',
        ];

        
    
}
