<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use App\Models\Campaign;

class CampaignController extends Controller
{
    public function showAll()
    {
        //$campaign = Campaign::all();
        $campaign = DB::table('campaign')->get();
        return view('campaign.campaignAll', compact('campaign'));
    }

    public function show(string $id): View
    {
        $campaign = Campaign::find($id);
        //print($accounts);
        return view('campaign.campaign', compact('campaign'));
    }

    public function create()
    {
        //$campaign = Campaign::all();
        return view('campaign.campaignCreate');
    }

    public function createIndividual()
    {
        //$campaign = Campaign::all();
        return view('campaign.campaignCreateIndividual');
    }

    public function createOrganization()
    {
        //$campaign = Campaign::all();
        return view('campaign.campaignCreateOrganization');
    }

    public function saveIndividual(Request $request)
    {
        $campaign = new Campaign;
        $campaign->id_user = Auth::user()->id;
        $campaign->campaign_name = $request->Campaign_Name;
        $campaign->campaign_Detail = $request->Campaign_Details;
        $campaign->campaign_Tel = $request->Campaign_Tel;
        $campaign->bank_ID = $request->Campaign_Bank_ID;
        $campaign->bank_type = $request->Campaign_Bank_Type;
        $campaign->campaign_Category = $request->Campaign_Category;
        $campaign->goals = $request->Campaign_Donation_Goals;
        $campaign->campaign_type = 'Individual';
        $imageVal = $request->file('Campaign_Image');
        $imgName = strtolower($imageVal->getClientOriginalExtension());
        $name = hexdec(uniqid());
        $saveName = $name . '.' . $imgName;
        $upload_location = 'image/campaignImage/';
        $full_path = $upload_location . $saveName;
        $campaign->campaign_Image = $full_path;
        $campaign->save();
        $imageVal->move($upload_location, $saveName);
        $campaign = DB::table('campaigns')->get();
       // return view('campaign.campaignAll', compact('campaign'));
       return redirect('home');
    }

    public function saveOrganization(Request $request)
    {
        $campaign = new Campaign;
        $campaign->id_user = Auth::user()->id;
        $campaign->campaign_name = $request->Campaign_Name;
        $campaign->campaign_Detail = $request->Campaign_Details;
        $campaign->campaign_Tel = $request->Campaign_Tel;
        $campaign->bank_ID = $request->Campaign_Bank_ID;
        $campaign->bank_type = $request->Campaign_Bank_Type;
        $campaign->campaign_Category = $request->Campaign_Category;
        $campaign->goals = $request->Campaign_Donation_Goals;
        $campaign->ins_name = $request->Campaign_Institute_Name;
        $campaign->ins_Tel = $request->Campaign_Institute_Tel;
        $campaign->Campaign_Type = 'Organization';
        $imageVal = $request->file('Campaign_Institute_Paper');
        $imgName = strtolower($imageVal->getClientOriginalExtension());
        $name = hexdec(uniqid());
        $saveName = $name . '.' . $imgName;
        $upload_location = 'image/campaignImage/';
        $full_path = $upload_location . $saveName;
        $campaign->ins_Paper = $full_path;
        $imageVal->move($upload_location, $saveName);
        $imageVal2 = $request->file('Campaign_Image');
        $imgName2 = strtolower($imageVal2->getClientOriginalExtension());
        $name2 = hexdec(uniqid());
        $saveName2 = $name2 . '.' . $imgName2;
        $upload_location2 = 'image/campaignImage/';
        $full_path2 = $upload_location2 . $saveName2;
        $campaign->campaign_Image = $full_path2;
        $campaign->save();
        $imageVal2->move($upload_location2, $saveName2);
        $campaign = DB::table('campaigns')->get();
        // return view('campaign.campaignAll', compact('campaign'));
        return redirect('home');
    }

    public function edit(string $id)
    {
        $campaign = Campaign::find($id);
        return view('campaign.campaignEdit', compact('campaign'));
    }

    public function update(Request $request, $id)
    {
        $update = Campaign::find($id)->update([
            'Account_ID' => 1,
            'Campaign_Name' => $request->Campaign_Name,
            'Campaign_Details' => $request->Campaign_Details,
            'Campaign_Tel' => $request->Campaign_Tel,
            'Campaign_Bank_ID' => $request->Campaign_Bank_ID,
            'Campaign_Bank_Type' => $request->Campaign_Bank_Type,
            'Campaign_Category' => $request->Campaign_Category,
            'Campaign_Type' => $request->Campaign_Type,
        ]);
        return redirect()->route('campaignAll')->with('success', "Update Complete");
    }
        //การเงิน
        public function indexEmp(){
            $dataC['campaign'] = Campaign::all()->where('status', 'close')->where('grant', 'agree');
            return view('formForEmp.campaige', $dataC);
        }
    
        public function showC(string $id): View
        {
            $DATA = Campaign::find($id);
            if($DATA->Cam_type == 'personal'){
            return view('formForEmp.formCam', ['campaign' => Campaign::find($id),
            'campaignU' => Campaign::join('users', 'users.id', '=', 'campaigns.id_user')->find($id)]);         
            }
            else {
            return view('formForEmp.formCamCom', ['campaign' => Campaign::find($id),
            'campaignU' => Campaign::join('users', 'users.id', '=', 'campaigns.id_user')->find($id)]);       
            }
        //return view('formForEmp.formTop', ['top_up' => Top_up::join('users', 'users.id', '=', 'top_ups.id_user')->find($id)]);
        }       
        public function agreeC(string $id): View
        {
            return view('formForEmp.all_Money',['campaign' => Campaign::where('id', $id)->update(['status' => 'end']),
            
        ]);
            
        }
}

