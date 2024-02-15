<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryUser extends Model
{
    use HasFactory;
    protected $table = 'history_users';
    protected $fillable = ['id_user','amount','type','status',];
}
