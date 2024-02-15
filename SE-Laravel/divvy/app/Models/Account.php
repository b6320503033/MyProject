<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    protected $table = 'account';

    protected $fillable = [
        'Account_Name ',
        'Account_Firstname',
        'Account_Surname',
        'Account_Birthday',
        'Account_Profile_Picture',
        'Account_Gender',
        'Account_Tel',
        'Account_Email',
        'Account_ID_Card_Number	',
        'Account_Bank_Type',
        'Account_Bank_ID',
        'Account_Address',
        'Account_Username',
        'Account_Password',
        'Account_Profile_Picture',
        'Verification_ID ',
        'Account_Status',
    ];

    protected $casts = [
        'Account_Status' => 'string'
    ];

    protected $attributes = [
        'Account_Status' => 'active'
    ];

    public function getStatusOptions()
    {
        return [
            'UnBan' => 'UnBan',
            'Ban' => 'Ban',
        ];
    }

    public function getStatusAttribute($value)
    {
        return $this->getStatusOptions()[$value];
    }

    public function setStatusAttribute($value)
    {
        $this->attributes['status'] = array_search($value, $this->getStatusOptions());
    }
}
