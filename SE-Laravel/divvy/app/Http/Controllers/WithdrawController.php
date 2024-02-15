<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Withdraw;
use Illuminate\Support\Facades\withdraws;
use Illuminate\View\View;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\users;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class WithdrawController extends Controller
{
    //

    /*public function IndexFormWith(){
        return view('withdraw.index');
    }*/

    public function store(Request $request){

        $withdraws = new Withdraw;  
        $withdraws->id_user = auth::user()->id;
        $withdraws->amount = $request->input('amount');
        $withdraws->reason = $request->input('reason');
        $withdraws->bank_name = $request->input('bank_name');
        $withdraws->Baccount_number = $request->input('Baccount_number');
        $withdraws->status = $request->input('status');

        $users = User::find($withdraws->id_user);
        if(($withdraws->amount) <= ($users->amount_user)){
        $withdraws->save();   
         return redirect()->route('WithUser')->with('success', 'ส่งแบบฟอร์มเรียบร้อย');                
        }else{ return redirect()->route('WithUser')->with('error', 'ยอดเงินของคุณไม่เพียงพอ');
        }
    }

    public function index(){
        return view('withdraw.index');
    }

    public function indexEmp(){
        $dataW['withdraws'] = Withdraw::where('status', 'non')->orderBy('id')->paginate(15);
        return view('formForEmp.withdraw', $dataW);
    }

    public function show(string $id_user, string $id): View
    {
        return view('formForEmp.formWith', ['withdraw' => Withdraw::find($id),
        'withdrawU' => Withdraw::join('users', 'users.id', '=', 'withdraws.id_user')->find($id)
    ]);
    }




        //ข้างล่างสมมติว่าเป็น Controller ของ Campaige
    /*
    public function indexEmp(){
        $dataC['campaiges'] = Campaige::where('status', 'close')->orderBy('id')->paginate(15);
        return view('formForEmp.campaige', $dataC);
    }

    public function show(string $id): View
    {
        return view('formForEmp.formCam', ['campaige' => Campaige::find($id),
        'campaigeU' => Campaige::join('users', 'users.id', '=', 'campaiges.id_user')->find($id)
    ]);

        public function endCam(string $id_user, string $id): View
    {
        return view('formForEmp.campaige', ['campaiges' => Campaige::where('id', $id)->update(['status' => 'end'])
    ]);
    }
    
    */
}
