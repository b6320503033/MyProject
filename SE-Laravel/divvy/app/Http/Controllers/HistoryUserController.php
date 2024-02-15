<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\history_users;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\users;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Models\HistoryUser;
use Illuminate\View\View;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class HistoryUserController extends Controller
{
    //

    public function hisUserIndex(){
        $id_user =Auth::user()->id;
        $dataHU['history_users'] = HistoryUser::where('id_user', $id_user)->orderBy('id')->paginate(10);
        return view('his_money.his_money', $dataHU);
    }
}
