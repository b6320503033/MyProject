<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use App\Models\Campaign;
use App\Models\verifyform;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\collection;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


   public function anoHome(){
    return view('welcome');
   }
    public function index()
    {
        $campaign=DB::table('campaigns')->get();
        return view('home', compact('campaign'));
    }
    public function financeHome()
    {
        return view('financehome');
    }
    public function documentHome()
    {
        $index = verifyForm::whereIn('status_form', [0])->get();
        if($index->isEmpty()){
            return view('documenthome');
        }
        else{
            return view('admin.adminForm',compact('index'));
        }
        
    }
    public function confirm($id){
        $confirmForm = verifyForm::whereIn('userId', [$id])->get();
        return view('admin.adminConfirm',compact('confirmForm'));
    }

    public function agree(Request $request){
        $request->validate([
            'pass'=>'required',
            'userId'=>'required'
        ],
    );

        $verifyForm = verifyForm::whereIn('userId', [$request->userId])->get();
        $verifyForm = verifyForm::whereIn('userId', [$request->userId])->update(['status_form' => $request->pass]);
        //$user = User::find($request->userId);
        
        //$verifyForm = verifyForm::find();

        if($request->pass == 1){
            $user = User::whereIn('id', [$request->userId])->update(['status' => 2]);
        }
        else{
            $user = User::whereIn('id', [$request->userId])->update(['status' => 0]);
            $verifyForm = verifyForm::whereIn('userId', [$request->userId])->delete();
        }
        

        
        $index = verifyForm::whereIn('status_form', [0])->get();
        if($index->isEmpty()){
            return view('documenthome');
        }
        else{
            return view('admin.adminForm',compact('index'));
        }
    }
    public function adminHome()
    {
        return view('adminhome');
    }
    public function changePassword()
    {
        return view('changePassword/change-password');
    }

    public function updatePassword(Request $request){
        
        #validation
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed|min:8',
        ],
    );
        //dd($request->all());
        #macth old Password
        if(!Hash::check($request->old_password,auth()->user()->password)){
            return back()->with("error","รหัสผ่านเดิมไม่ถูกต้อง!");
        }
        #update newPassword

        return back()->with("status","เปลี่ยนรหัสผ่านเรียบร้อยแล้ว!");
    }
}
