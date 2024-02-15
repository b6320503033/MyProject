<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use App\Models\Campaign;
use App\Models\DonationRecord;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Top_up;
use App\Models\HistoryUser;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\history_users;
use Illuminate\Support\Facades\users;
use Illuminate\Support\Facades\top_ups;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\RedirectResponse;
use App\Models\Withdraw;
use Illuminate\Support\Facades\withdraws;


class UserController extends Controller
{
    public function profile() : View{
        return view('profile.show');
    }
    public function noti() : View{
        return view('user.noti');
    }
    public function show(int $ID) : View
    {
        $ID = intval($ID);
        
        $campaign = Campaign::join('users', 'users.id', '=', 'campaigns.id_user')
                ->where('campaigns.id', $ID)
                ->select('campaigns.*', 'users.name')
                ->first();
        
        return view('user.campaign', compact('campaign'));
    }
    public function userDonate(Request $request ) 
    {

        $now_cur = DB::table('campaigns')
            ->where('id', $request->Campaign_ID)
            ->value('current_money');
        
        $goals = DB::table('campaigns')
            ->where('id', $request->Campaign_ID)
            ->value('goals');

        $status = DB::table('campaigns')
            ->where('id', $request->Campaign_ID)
            ->value('status');
            
        
     if( $now_cur >= $goals||$status!="open"){
                $campaign=DB::table('campaigns')->get();
                return redirect()->route('home', compact('campaign'))->with('error', 'This campaign is closed or has reached its goal.');
            }
               
       
        $request->validate([
            'donation_amount'=>'required|nullable|numeric|min:0.01'
           ],
            [
                'donation_amount.required'=>'กรุณาป้อนจำนวนเงิน',
                'donation_amount.numeric'=>'กรุณาป้อนจำนวนที่ถูกต้อง(ขั้นต่ำคือ 0.01)',
                'donation_amount.min:0.01'=>'กรุณาป้อนจำนวนที่ถูกต้อง(ขั้นต่ำคือ 0.01)'
                
            ]);
       
        $data=array();
        $data["Amount"]=$request->donation_amount;
        $data["User_ID"]=Auth::user()->id;
        $data["Campaign_ID"]=$request->Campaign_ID;
        
    
        $total_donations = DB::table('campaigns')
        ->where('id', $data["Campaign_ID"])
        ->value('current_money');
        
        
        $target_amount = DB::table('campaigns')
        ->where('id', $data["Campaign_ID"])
        ->value('goals');

       

        if($total_donations+$request->donation_amount > $target_amount){
            return redirect()->back()->with('warn','คุณได้กรอกจำนวนเงินเกินที่เปิดรับบริจาค');
            
        }
        
        else{
            

            if(Auth::user()->amount_user < $request->donation_amount){
                return redirect()->back()->with('danger','ยอดเงินคงเหลือของคุณไม่เพียงพอ');
            }
            else{
                
                $now_money = $total_donations+$request->donation_amount;

                DB::table('campaigns')
                ->where('id', $data["Campaign_ID"])
                ->update(['current_money' => $now_money]);

                $current_balance=Auth::user()->amount_user  - $request->donation_amount;
                
                DB::table('users')
                ->where('id', $data["User_ID"])
                ->update(['amount_user' => $current_balance]);
                
                
            }

            $afterupdate_donations = DB::table('campaigns')
            ->where('id', $data["Campaign_ID"])
            ->value('current_money');

            if($afterupdate_donations==$target_amount){
                DB::table('campaigns')
                ->where('id', $data["Campaign_ID"])
                ->update(['status' => "close"]);

                
        
                $campaign=DB::table('campaigns')->get();
                return redirect()->route('home', compact('campaign'))->with('error', 'This campaign is closed or has reached its goal.');
                

            }      

        }
        

    return redirect()->back()->with('success','บริจาคสำเร็จ');
    
   
    }

    public function manage()
    {
        $mycampaigns=DB::table('campaigns')
        ->where('id_user',Auth::user()->id)
        ->get();
        return view('user.manage',compact('mycampaigns'));
    }


    public function search(Request $request)
        {
            $key = $request->input('key');
            $results = DB::table('campaigns')
                        ->where('campaign_name', 'like', '%'.$key.'%')
                        ->orWhere('campaign_Detail', 'like', '%'.$key.'%')
                        ->get();
            return view('search.results', ['results' => $results]);
        }

        public function cancel(Request $request ) 
        {
            DB::table('campaigns')
                ->where('id', $request->Campaign_ID)
                ->update(['status' => "cancel"]);
            return redirect()->back()->with('alert','ทำการยกเลิกแล้ว');
        }
        public function close(Request $request)
        {
            DB::table('campaigns')
                ->where('id', $request->Campaign_ID)
                ->update(['status' => "close"]);
            return redirect()->back()->with('alert','ทำการปิดแล้ว');
        }

        public function detailShow(int $ID) : View
    {
        $ID = intval($ID);
        
        $campaign = Campaign::join('users', 'users.id', '=', 'campaigns.id_user')
                ->where('campaigns.id', $ID)
                ->select('campaigns.*', 'users.name')
                ->first();
        
        return view('user.detail', compact('campaign'));
    }


    //ของฟ้า
    public function addAmount(string $id_user,string $id, string $sumAmount, string $amount): View
    {
        return view('formForEmp.all_Money',['top_ups' => Top_up::where('id', $id)->update(['status' => 'check']),
        'User' => User::where('id', $id_user)->update(['amount_user' => $sumAmount]),
        'History' => HistoryUser::insertGetId(['id_user' => $id_user, 'amount' => $amount, 'type' => 'เติมเงิน', 'status' => 'เติมเงินสำเร็จ'])
    ]);
        
    }

    public function reduceAmount(string $id_user,string $id, string $sumAmount, string $amount): View
    {
        return view('formForEmp.all_Money', ['User' => User::where('id', $id_user)->update(['amount_user' => $sumAmount]),
        'withdraws' => Withdraw::where('id', $id)->update(['status' => 'check']),
        'History' => HistoryUser::insertGetId(['id_user' => $id_user, 'amount' => $amount, 'type' => 'คืนเงิน', 'status' => 'คืนเงินสำเร็จ'])
    ]);
    }

    public function rejectT(string $id_user,string $id, string $amount): View
    {
        return view('formForEmp.all_Money',['top_ups' => Top_up::where('id', $id)->update(['status' => 'check']),
        'History' => HistoryUser::insertGetId(['id_user' => $id_user, 'amount' => $amount, 'type' => 'เติมเงิน', 'status' => 'เติมเงินไม่สำเร็จ'])
       ]);
    }

    public function rejectW(string $id_user,string $id, string $amount): View
    {
        return view('formForEmp.all_Money', ['withdraws' => Withdraw::where('id', $id)->update(['status' => 'check']),
        'History' => HistoryUser::insertGetId(['id_user' => $id_user, 'amount' => $amount, 'type' => 'คืนเงิน', 'status' => 'คืนเงินไม่สำเร็จ'])
    ]);
    }
    //จบ

    
    
}


?>