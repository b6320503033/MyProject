<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Campaign extends Model
{
    use HasFactory;

    protected $table = 'campaigns';

    protected $primarykey='id';

    protected $fillable = [
        'id_user',
        'campaign_name',
        'campaign_Details',
        'campaign_Tel',
        'bank_ID',
        'bank_type',
        'campaign_Image',
        'Campaign_Category',
        'current_money',
        'goals',
        'campaign_type',
        'ins_name',
        'ins_Paper',
        'ins_Tel',
        'grant',
        'status',
        'created_at',
        'updated_at'
    ];
}