<?php

namespace App\Http\Controllers\Affiliate;

use App\Classes\GeniusMailer;
use App\Models\AdminAffiliateCommisssionSetting;
use App\Models\AffiliateUserCommission;
use App\Models\Generalsetting;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class AffiliateController extends Controller
{
    public function showDashboard()
    {
        $data = AffiliateUserCommission::where('user_id',auth()->guard('web')->user()->id)->get();
        return view('affiliate.dashboard', compact('data'));
    }
    public function showAffiliateRegisterForm(Request $request)
    {
        return view('affiliate.registration-form');
    }
    public function register(Request $request)
    {
        $gs = Generalsetting::findOrFail(1);
        $request->validate([
            'name'   => 'required|string',
            'email'   => 'required|email|unique:users',
            'password' => 'required|confirmed'
        ]);
        $token = md5(time().$request->name.$request->email);
        $user = User::create([
            'name'  =>  $request['name'],
            'email'  =>  $request['email'],
            'is_affiliate'  =>  '1',
            'password'  =>  bcrypt($request['password']),
            'verification_link'  =>  $token,
        ]);

        if($gs->is_verification_email == 1)
        {
            $to = $request->email;
            $subject = 'Verify your email address.';
            $msg = "Dear Customer,<br> We noticed that you need to verify your email address. <a href=".url('user/register/verify/'.$token).">Simply click here to verify. </a>";
            //Sending Email To Customer
            if($gs->is_smtp == 1)
            {
                $data = [
                    'to' => $to,
                    'subject' => $subject,
                    'body' => $msg,
                ];

                $mailer = new GeniusMailer();
                $mailer->sendCustomMail($data);
            }
            else
            {
                $headers = "From: ".$gs->from_name."<".$gs->from_email.">";
                mail($to,$subject,$msg,$headers);
            }
        }

        if ($user)
        {
            return redirect()->back()->with('success','successfully registered');
        }else{
            return redirect()->back()->with('error','some thing went wrong');
        }
    }

    public function showSetting()
    {
        return view('affiliate.setting.show');
    }

    public function showAffiliateSetting()
    {
        $data = AdminAffiliateCommisssionSetting::get();
        return view('affiliate.admin.affiliate-setting-show',compact('data'));
    }

    public function createAffiliateSetting(Request $request)
    {
        $user = AdminAffiliateCommisssionSetting::where('type', 'user_commission')->first();
        $vendor = AdminAffiliateCommisssionSetting::where('type', 'vender_commission')->first();
        $user->update([
            'commission' => $request->user_commission,
        ]);
        $vendor->update([
            'commission'   =>  $request->vender_commission
        ]);
        return 'your record updated successfully';
    }

}
