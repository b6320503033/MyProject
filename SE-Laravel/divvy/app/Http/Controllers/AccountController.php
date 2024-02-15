<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class AccountController extends Controller
{
    public function showAll() {
        $accounts=DB::table('account')->get();
        return view('account.accountAll', compact('accounts'));
    }

    public function show(string $id) : View
    {
        $account=DB::table('account')->where('account.Account_ID',$id)->get();
        //print($accounts);
        return view('account.account', compact('account'));
    }
}
