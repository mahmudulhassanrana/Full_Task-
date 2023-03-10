<?php

namespace App\Http\Controllers;

use App\Admin;
use Auth;
use App\user;
use App\Affiliate;
use App\AffiliatePayment;
use App\UserPayment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function affiliateShow()
    {
        $AffiliateInfos=Affiliate::whereNull('affiliate_ref_id')->get();
        return view('admin.affiliate',compact('AffiliateInfos'));
    }

    public function subAffiliateShow()
    {
        $SubAffiliateInfos=Affiliate::whereNotNull('affiliate_ref_id')->get();
        return view('admin.subaffiliate',compact('SubAffiliateInfos'));
    }

    public function UserShow()
    {

        $UserInfos=User::all();
        return view('admin.user',compact('UserInfos'));

    }

    public function affiliateCreate()
    {
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email|unique:affiliate',
            'promo_code' => 'required|unique:affiliate',
            'password' => 'required'
        ]);
        $data = request(['name', 'email','promo_code', 'password']);
        $data['password'] = Hash::make($data['password']);
        Affiliate::create($data);
        return redirect('admin/affiliate')->with('success');
    }
    public function affiliateCheckEvent(Request $request)
    {
        if(isset($request->email)){
            $email =Affiliate::where('email',$request->email)->get()->toarray();
            if(!empty($email)){
                return response()->json(["email" => "found"], 200);
            }else{
                return response()->json(["email" =>"not found"], 200);
            }
        }elseif(isset($request->promo_code)){
            $email =Affiliate::where('promo_code',$request->promo_code)->get()->toarray();
            if(!empty($email)){
                return response()->json(["promo_code" => "found"], 200);
            }else{
                return response()->json(["promo_code" =>"not found"], 200);
            }

        }

    }
    public function UserFullHistory($user_id)
    {
        $User=User::where('id',$user_id)->first();
        User::where('id',$user_id)->first();
        $commission_payment_details=AffiliatePayment::where('user_id',$user_id)->get();
        $user_payment_details = UserPayment::where('id',$user_id)->latest()->get();
        return view('admin.usertransaction',compact('commission_payment_details','user_payment_details','User'));
    }
    public function logout()
    {
        Auth::guard('web')->logout();
        Auth::guard('admin')->logout();
        Auth::guard('affiliate')->logout();
        return redirect('/');
    }

}
