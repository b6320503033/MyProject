<?php

namespace App\Models;

use App\Http\Controllers\Top_upController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Top_up extends Model
{
    use HasFactory;
    protected $table = 'top_ups';
    protected $fillable = ['id_user','amount','transfer_date','transfer_time','money_slip','status',];
}

