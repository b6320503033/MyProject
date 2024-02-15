<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use App\Models\User;
use App\Models\campaigns;

class AdminController extends Controller
{
    //
    public function showAllAccount()
    {
        $accounts = DB::table('users')
            ->leftjoin('verify_forms', 'users.id', '=', 'verify_forms.userId')
            ->select('users.id', 'verify_forms.image', 'verify_forms.phone_Number', 'users.name', 'verify_forms.firstname', 'verify_forms.lasName', 'verify_forms.birthDate', 'users.email', 'users.password', 'users.amount_user', 'users.ban_status')
            ->where('users.ban_status', '=', 0)->where('users.is_admin', '=', 1)
            ->get();
        $accounts = $accounts->map(function ($account) {
            $account->image = $account->image ?? 'image/userImage/base.png';

            return $account;
        });
        // print($accounts);
        $type = 1;
        return view('admin.accountAll', compact('accounts', 'type'));
    }

    public function showAccount(Request $request)
    {
        $account = DB::table('users')
            ->leftjoin('verify_forms', 'users.id', '=', 'verify_forms.userId')
            ->select('users.id', 'verify_forms.image', 'verify_forms.phone_Number', 'users.name', 'verify_forms.firstname', 'verify_forms.lasName', 'verify_forms.birthDate', 'users.email', 'users.password', 'users.amount_user', 'users.ban_status')
            ->where('users.id', $request->input('id'))
            ->where('users.ban_status', '=', 0)->where('users.is_admin', '=', 1)
            ->get();
        $account = $account->map(function ($account) {
            $account->image = $account->image ?? 'image/userImage/base.png';

            return $account;
        });
        return view('admin.account', compact('account'));
    }

    public function searchAccount(Request $request)
    {
        $accounts = DB::table('users')
            ->leftjoin('verify_forms', 'users.id', '=', 'verify_forms.userId')
            ->select('users.id', 'verify_forms.image', 'verify_forms.phone_Number', 'users.name', 'verify_forms.firstname', 'verify_forms.lasName', 'verify_forms.birthDate', 'users.email', 'users.password', 'users.amount_user', 'users.ban_status')
            ->where('users.ban_status', '=', 0)
            ->where('users.name', 'like', '%' . $request->input('query') . '%')->where('users.is_admin', '=', 1)
            ->get();
        $accounts = $accounts->map(function ($account) {
            $account->image = $account->image ?? 'image/userImage/base.png';

            return $account;
        });
        $type = 1;
        return view('admin.accountAll', compact('accounts', 'type'));
    }

    public function showBanAccount()
    {
        $accounts = DB::table('users')
            ->leftjoin('verify_forms', 'users.id', '=', 'verify_forms.userId')
            ->select('users.id', 'verify_forms.image', 'verify_forms.phone_Number', 'users.name', 'verify_forms.firstname', 'verify_forms.lasName', 'verify_forms.birthDate', 'users.email', 'users.password', 'users.amount_user', 'users.ban_status')
            ->where('users.ban_status', '=', 1)->where('users.is_admin', '=', 1)
            ->get();
        $accounts = $accounts->map(function ($account) {
            $account->image = $account->image ?? 'image/userImage/base.png';

            return $account;
        });
        $type = 2;
        //print($accounts);
        return view('admin.accountAll', compact('accounts', 'type'));
    }

    public function showBan(Request $request)
    {
        $account = DB::table('users')
            ->leftjoin('verify_forms', 'users.id', '=', 'verify_forms.userId')
            ->select('users.id', 'verify_forms.image', 'verify_forms.phone_Number', 'users.name', 'verify_forms.firstname', 'verify_forms.lasName', 'verify_forms.birthDate', 'users.email', 'users.password', 'users.amount_user', 'users.ban_status')
            ->where('users.id', $request->input('id'))
            ->where('users.ban_status', '=', 1)->where('users.is_admin', '=', 1)
            ->get();
        $account = $account->map(function ($account) {
            $account->image = $account->image ?? 'image/userImage/base.png';

            return $account;
        });
        return view('admin.account', compact('account'));
    }

    public function searchBanAccount(Request $request)
    {
        $accounts = DB::table('users')
            ->leftjoin('verify_forms', 'users.id', '=', 'verify_forms.userId')
            ->select('users.id', 'verify_forms.image', 'verify_forms.phone_Number', 'users.name', 'verify_forms.firstname', 'verify_forms.lasName', 'verify_forms.birthDate', 'users.email', 'users.password', 'users.amount_user', 'users.ban_status')
            ->where('users.ban_status', '=', 1)
            ->where('users.name', 'like', '%' . $request->input('query') . '%')->where('users.is_admin', '=', 1)
            ->get();
        $accounts = $accounts->map(function ($account) {
            $account->image = $account->image ?? 'image/userImage/base.png';

            return $account;
        });
        $type = 2;
        return view('admin.accountAll', compact('accounts', 'type'));
    }

    public function updateAccount(Request $request)
    {
        User::where('id', $request->input('id'))->update(['ban_status' => '1']);
        $accounts = DB::table('users')
            ->leftjoin('verify_forms', 'users.id', '=', 'verify_forms.userId')
            ->select('users.id', 'verify_forms.image', 'verify_forms.phone_Number', 'users.name', 'verify_forms.firstname', 'verify_forms.lasName', 'verify_forms.birthDate', 'users.email', 'users.password', 'users.amount_user', 'users.ban_status')
            ->where('users.ban_status', '=', 0)->where('users.is_admin', '=', 1)
            ->get();
        $accounts = $accounts->map(function ($account) {
            $account->image = $account->image ?? 'image/userImage/base.png';

            return $account;
        });
        $type = 1;
        return view('admin.accountAll', compact('accounts', 'type'));
    }

    public function updateBanAccount(Request $request)
    {
        User::where('id', $request->input('id'))->update(['ban_status' => '0']);
        $accounts = DB::table('users')
            ->leftjoin('verify_forms', 'users.id', '=', 'verify_forms.userId')
            ->select('users.id', 'verify_forms.image', 'verify_forms.phone_Number', 'users.name', 'verify_forms.firstname', 'verify_forms.lasName', 'verify_forms.birthDate', 'users.email', 'users.password', 'users.amount_user', 'users.ban_status')
            ->where('users.ban_status', '=', 1)->where('users.is_admin', '=', 1)
            ->get();
        $accounts = $accounts->map(function ($account) {
            $account->image = $account->image ?? 'image/userImage/base.png';

            return $account;
        });
        $type = 2;
        //print($accounts);
        return view('admin.accountAll', compact('accounts', 'type'));
    }

    public function showAllCampaign()
    {
        //$campaigns = campaigns::all();
        $campaigns = DB::table('campaigns')
            ->select('campaigns.id', 'campaigns.campaign_Image', 'campaigns.campaign_name', 'users.name', 'campaigns.current_money', 'campaigns.goals', 'campaigns.campaign_type', 'campaigns.status')
            ->join('users', 'users.id', '=', 'campaigns.id_user')
            ->get();
        return view('admin.campaignAll', compact('campaigns'));
    }

    public function showCampaign(Request $request)
    {
        $campaigns = DB::table('campaigns')
            ->select('campaigns.id', 'campaigns.campaign_Detail', 'campaigns.campaign_Image', 'campaigns.campaign_name', 'users.name', 'campaigns.current_money', 'campaigns.goals', 'campaigns.campaign_type', 'campaigns.status', 'campaigns.campaign_Tel', 'campaigns.bank_ID', 'campaigns.bank_type')
            ->join('users', 'users.id', '=', 'campaigns.id_user')
            ->where('campaigns.id', $request->input('id'))
            ->get();
        return view('admin.campaign', compact('campaigns'));
    }

    public function searchCampaign(Request $request)
    {
        $campaigns = DB::table('campaigns')
            ->select('campaigns.id', 'campaigns.campaign_Detail', 'campaigns.campaign_Image', 'campaigns.campaign_name', 'users.name', 'campaigns.current_money', 'campaigns.goals', 'campaigns.campaign_type', 'campaigns.status')
            ->join('users', 'users.id', '=', 'campaigns.id_user')
            ->where('campaigns.campaign_name', 'like', '%' . $request->input('query') . '%')
            ->orwhere('campaigns.campaign_Detail', 'like', '%' . $request->input('query') . '%')
            ->orwhere('users.name', 'like', '%' . $request->input('query') . '%')
            ->orwhere('campaigns.goals', 'like', '%' . $request->input('query') . '%')
            ->orwhere('campaigns.campaign_type', 'like', '%' . $request->input('query') . '%')
            ->orwhere('campaigns.status', 'like', '%' . $request->input('query') . '%')
            ->get();
        return view('admin.campaignAll', compact('campaigns'));
    }

    public function cancelCampaign(Request $request)
    {
        // print(DB::table('campaigns')->where('ID', $request->input('id'))->get());
        DB::table('campaigns')->where('id', $request->input('id'))->update(['status' => 'Cancel']);
        $campaigns = DB::table('campaigns')
            ->select('campaigns.id', 'campaigns.campaign_Detail', 'campaigns.campaign_Image', 'campaigns.campaign_name', 'users.name', 'campaigns.current_money', 'campaigns.goals', 'campaigns.campaign_type', 'campaigns.status')
            ->join('users', 'users.id', '=', 'campaigns.id_user')->get();
        return view('admin.campaignAll', compact('campaigns'));
    }

    public function closeCampaign(Request $request)
    {
        // print(DB::table('campaigns')->where('ID', $request->input('id'))->get());
        DB::table('campaigns')->where('id', $request->input('id'))->update(['status' => 'Close']);
        $campaigns = DB::table('campaigns')
            ->select('campaigns.id', 'campaigns.campaign_Detail', 'campaigns.campaign_Image', 'campaigns.campaign_name', 'users.name', 'campaigns.current_money', 'campaigns.goals', 'campaigns.campaign_type', 'campaigns.status')
            ->join('users', 'users.id', '=', 'campaigns.id_user')->get();
        return view('admin.campaignAll', compact('campaigns'));
    }

    public static function showReportedUsers()
    {
        $reportUsers = DB::table('account')
            ->join('report', 'account.ID', '=', 'report.Account_ID')
            ->select(array('account.ID', 'account.Account_Firstname', 'account.Account_Surname', 'account.Account_Name', 'account.Account_Birthday', 'account.Account_Status', 'report.Report_Reason', 'report.sending'))
            ->groupBy('account.ID', 'account.Account_Firstname', 'account.Account_Surname', 'account.Account_Name', 'account.Account_Birthday', 'account.Account_Status', 'report.Report_Reason', 'report.sending')
            ->where('account.Account_Status', '=', 'unban')
            ->where('report.Sending', '=', 'Admin')
            ->get();
        return $reportUsers;
    }
}
