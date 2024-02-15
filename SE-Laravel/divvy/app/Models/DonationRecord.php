<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class donationRecord extends Model
{
    use HasFactory;
    protected $table = 'donation_record';

    protected $fillable = [
        'Donation_ID',
        'Campaign_ID',
        'Amount',
        'Date',
        'Account_ID',
        'User_ID'
    ];

    

   
}
?>