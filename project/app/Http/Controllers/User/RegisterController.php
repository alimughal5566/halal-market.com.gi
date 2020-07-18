<?php

namespace App\Http\Controllers\User;

use App\Models\AdminAffiliateCommisssionSetting;
use App\MOdels\AffiliateUserCommission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Generalsetting;
use App\Models\User;
use App\Classes\GeniusMailer;
use App\Models\Notification;
use Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Input;
use Validator;

class RegisterController extends Controller
{

    public function register(Request $request)
    {
        $gs = Generalsetting::findOrFail(1);

        if($gs->is_capcha == 1)
        {
            $value = session('captcha_string');
            if ($request->codes != $value){
                return response()->json(array('errors' => [ 0 => 'Please enter Correct Capcha Code.' ]));
            }
        }
        //--- Validation Section

        $rules = [
            'email'   => 'required|email|unique:users',
            'password' => 'required|confirmed'
        ];
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }

//        dd(!empty($request->vendor));
        if(!empty($request->has('affiliate')))
        {
            $rules = [
                'name'   => 'required|string',
                'email'   => 'required|email|unique:users',
                'phone'   => 'required|',
                'address' => 'required|string',
                'password' => 'required|confirmed'
            ];
            $validator = Validator::make(Input::all(), $rules);
            if ($validator->fails()) {
                return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
            }
            $input['type'] = 'affiliate';
        }elseif(!empty($request->vendor)){
            //--- Validation Section
            $rules = [
                'shop_name' => 'unique:users',
                'shop_number'  => 'max:10'
            ];
            $customs = [
                'shop_name.unique' => 'This Shop Name has already been taken.',
                'shop_number.max'  => 'Shop Number Must Be Less Then 10 Digit.'
            ];

            $validator = Validator::make(Input::all(), $rules, $customs);
            if ($validator->fails()) {
                return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
            }
            else
            $input['is_vendor'] = 1;
            $input['type'] = 'affiliate';

        }
        //--- Validation Section Ends
        $user = new User;
        $input = $request->all();
        if(!empty($request->has('affiliate')))
        {
            $input['type'] = 'affiliate';
        }

//        dd($request['ref'] != null);
//        $ref = Crypt::decryptString($request['ref']);
//        dd($ref);

        if ($request->has('ref') && $request['ref'] != null ){
            $ref = Crypt::decryptString($request['ref']);

            $ref_user_id = User::where('email',$ref)->first()->id;
//            dd($ref_user_id);
            $input['ref_user_id'] = $ref_user_id ;

            $commission = new AffiliateUserCommission;
            if ($request->has('vendor')){
                $array = [
                    'user_id' =>   $input['ref_user_id'],
                    'type'  => 'vender',
                    'commission'    => AdminAffiliateCommisssionSetting::where('type','vender_commission')->first()->commission,
                    'status'    => 'pending',
                ];
            }else{
                $array = [
                    'user_id' =>   $input['ref_user_id'],
                    'type'  => 'user',
                    'commission'    => AdminAffiliateCommisssionSetting::where('type','user_commission')->first()->commission,
                    'status'    => 'pending',
                ];
            }
            $commission->fill($array)->save();
        }
        $input['password'] = bcrypt($request['password']);
        $token = md5(time().$request->name.$request->email);
//        dd($token);
        $input['verification_link'] = $token;
        $input['affilate_code'] = md5($request->name.$request->email);

        $user->fill($input)->save();

        if($gs->is_verification_email == 1 || true)
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
            return response()->json('We need to verify your email address. We have sent an email to '.$to.' to verify your email address. Please click link in that email to continue.');
        }
        else {

            $user->email_verified = 'Yes';
            $user->update();
            $notification = new Notification;
            $notification->user_id = $user->id;
            $notification->save();
            Auth::guard('web')->login($user);
            return response()->json(1);
        }

    }
//===================================================================================
//    public function register(Request $request)
//    {
//
//        $gs = Generalsetting::findOrFail(1);
//
//        if($gs->is_capcha == 1)
//        {
//            $value = session('captcha_string');
//            if ($request->codes != $value){
//                return response()->json(array('errors' => [ 0 => 'Please enter Correct Capcha Code.' ]));
//            }
//        }
//
//
//        //--- Validation Section
//
//        $rules = [
//            'email'   => 'required|email|unique:users',
//            'password' => 'required|confirmed'
//        ];
//        $validator = Validator::make(Input::all(), $rules);
//
//        if ($validator->fails()) {
//            return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
//        }
//        //--- Validation Section Ends
//
//        $user = new User;
//        $input = $request->all();
//        $input['password'] = bcrypt($request['password']);
//        $token = md5(time().$request->name.$request->email);
//        $input['verification_link'] = $token;
//        $input['affilate_code'] = md5($request->name.$request->email);
//
//        if(!empty($request->vendor))
//        {
//            //--- Validation Section
//            $rules = [
//                'shop_name' => 'unique:users',
//                'shop_number'  => 'max:10'
//            ];
//            $customs = [
//                'shop_name.unique' => 'This Shop Name has already been taken.',
//                'shop_number.max'  => 'Shop Number Must Be Less Then 10 Digit.'
//            ];
//
//            $validator = Validator::make(Input::all(), $rules, $customs);
//            if ($validator->fails()) {
//                return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
//            }
//            $input['is_vendor'] = 1;
//
//        }
//
//        $user->fill($input)->save();
//        if($gs->is_verification_email == 1)
//        {
//            $to = $request->email;
//            $subject = 'Verify your email address.';
//            $msg = "Dear Customer,<br> We noticed that you need to verify your email address. <a href=".url('user/register/verify/'.$token).">Simply click here to verify. </a>";
//            //Sending Email To Customer
//            if($gs->is_smtp == 1)
//            {
//                $data = [
//                    'to' => $to,
//                    'subject' => $subject,
//                    'body' => $msg,
//                ];
//
//                $mailer = new GeniusMailer();
//                $mailer->sendCustomMail($data);
//            }
//            else
//            {
//                $headers = "From: ".$gs->from_name."<".$gs->from_email.">";
//                mail($to,$subject,$msg,$headers);
//            }
//            return response()->json('We need to verify your email address. We have sent an email to '.$to.' to verify your email address. Please click link in that email to continue.');
//        }
//        else {
//
//            $user->email_verified = 'Yes';
//            $user->update();
//            $notification = new Notification;
//            $notification->user_id = $user->id;
//            $notification->save();
//            Auth::guard('web')->login($user);
//            return response()->json(1);
//        }
//
//    }

//===================================================================================
    public function token($token)
    {
        $gs = Generalsetting::findOrFail(1);

        if($gs->is_verification_email == 1  || true)
//
	        {
        $user = User::where('verification_link','=',$token)->first();
        if($user)
        {
            $user->email_verified = 'Yes';
            $user->update();
	        $notification = new Notification;
	        $notification->user_id = $user->id;
	        $notification->save();
            Auth::guard('web')->login($user);
            return redirect()->route('user-dashboard')->with('success','Email Verified Successfully');
        }
    		}
    		else {
    		return redirect()->back();
    		}
    }
}