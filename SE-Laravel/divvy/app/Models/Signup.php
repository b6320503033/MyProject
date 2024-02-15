<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Signup extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'Account_Firstname','Account_Surname','Account_Birthday',
        'Account_Username','Account_Password'
    ];

}
