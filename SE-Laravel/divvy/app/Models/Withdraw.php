<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Withdraw extends Model
{
    use HasFactory;
    protected $table = 'withdraws';
    protected $fillable = ['id_user','amount','reason','bank_name','Baccount_number','status',];
}
