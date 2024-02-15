<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use App\Models\Campaign;
use App\Models\DonationRecord;


class AnonymousController extends Controller
{
    function home(){
        $campaign=DB::table('campaigns')->get();
        
        return view('welcome', compact('campaign'));
    }

    public function show(int $Campaign_ID) : View
    {
        $campaign=Campaign::find($Campaign_ID);
        
        $total_donation=$total_donations = DB::table('history_users')
        ->where('Campaign_ID', $Campaign_ID)
        ->sum('amount');
        
        return view('anonymousCampaign', compact('campaign','total_donation'));
    }
   
    
    
    
}


?>
