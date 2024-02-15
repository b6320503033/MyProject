<?php

namespace App\Http\Controllers;


use App\Models\Top_up;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\top_ups;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\users;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class Top_upController extends Controller
{

    public function store(Request $request){

        $top_ups = new Top_up;  
        $top_ups->id_user = auth::user()->id;
        $top_ups->amount = $request->input('amount');
        $top_ups->transfer_date = $request->input('transfer_date');
        $top_ups->transfer_time = $request->input('transfer_time');
        if($request->hasfile('money_slip'))
        {
            $file = $request->file('money_slip');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/top_ups/', $filename);
            $top_ups->money_slip = $filename;
        }
        $top_ups->status = $request->input('status');
        $top_ups->save();
        return redirect()->route('intTop')->with('success', 'ส่งแบบฟอร์มเรียบร้อย');
    }
    

    public function index(){
        return view('top_up.index');
    }

    public function Allform(){
        return view('formForEmp.all_Money');
    }

    public function indexEmp(){
        $data['top_ups'] = Top_up::where('status', 'non')->orderBy('id')->paginate(15);
        //$data['top_ups'] = Top_up::where('status', 'non')->orderBy('id', 'desc')->paginate(15);
        return view('formForEmp.index', $data);
    }

    public function show(string $id_user,string $id): View
    {
        return view('formForEmp.formTop', ['top_up' => Top_up::find($id),
        'top_upU' => Top_up::join('users', 'users.id', '=', 'top_ups.id_user')->find($id)
        ]);

        //return view('formForEmp.formTop', ['top_up' => Top_up::join('users', 'users.id', '=', 'top_ups.id_user')->find($id)]);
    }



}
