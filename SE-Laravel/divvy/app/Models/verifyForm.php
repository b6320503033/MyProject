<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class verifyForm extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $fillable = [
        'status_form',
        'userId',
        'nameTitle',
        'firstName',
        'lasName',
        'birthDate',
        'phone_Number',
        'bank',
        'bank_num',
        'address',
        'image',
    ];
}
