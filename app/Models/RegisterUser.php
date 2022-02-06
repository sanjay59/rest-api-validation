<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegisterUser extends Model
{
    use HasFactory;
    protected $table='registerusers';
     protected $fillable = [
        'name',
        'email',
        'password',
        'mobile_no',
    ];
}
