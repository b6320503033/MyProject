<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\verifyForm;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\User;

class VerifyController extends Controller
{
    public function index(){
        $verifyForm = new User;
        if(Auth::user()->status == 1){
            $verifyForm = verifyForm::all();
            return view('/verify/WaitVerify',compact('verifyForm'))->with("status","กำลังดำเนินการตรวจสอบ");
        }
        else if(Auth::user()->status == 0){
            return view('/verify/verifyForm');
        }
        else{
            return view('createCampaign');
        }
            
    }
    public function submitForm(Request $request){
        $request->validate([
            
            'nameTitle'=>'required',
            'firstName'=>'required',
            'lasName'=>'required',
            'birthdate'=>'required',
            'phoneNum'=>'required',
            'bank'=>'required',
            'bankNum'=>'required',
            'address'=>'required',
            'imageValidate'=>'required'
        ],
    );
        
        //เข้ารหัสรูป
        $imageVal = $request->file('imageValidate');
        $imgName = strtolower($imageVal->getClientOriginalExtension());
        $name=hexdec(uniqid());
        $saveName = $name.'.'.$imgName;
        $upload_location = 'image/verifyImage/';
        $full_path = $upload_location.$saveName;

        
        
        //$imageVal->storeAs('public/image/verifyImage/',$saveName);

        $user = User::find(Auth::user()->id);
        $user->status = 1;
        $user->save();

        $verifyForm = new verifyForm;
        $verifyForm->userId = Auth::user()->id;
        $verifyForm->nameTitle = $request->nameTitle;
        $verifyForm->firstName = $request->firstName;
        $verifyForm->lasName = $request->lasName;
        $verifyForm->birthDate = $request->birthdate;
        $verifyForm->phone_Number = $request->phoneNum;
        $verifyForm->bank = $request->bank;
        $verifyForm->bank_num = $request->bankNum;
        $verifyForm->address = $request->address;
        $verifyForm->image = $full_path;
        //dd($request->all());
        $verifyForm->save();
        $imageVal->move($upload_location,$saveName);
        
        return redirect()->back()->with("status","กำลังดำเนินการตรวจสอบ");
    }
}
