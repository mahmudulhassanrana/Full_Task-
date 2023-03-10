<?php

namespace App\Http\Controllers;

use App\Affiliate;
use Auth;
use App\UserPayment;
use App\AffiliatePayment;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AffiliateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::guard('affiliate')->user() and empty(Auth::guard('affiliate')->user()->affiliate_ref_id)){
            $affiliate_id = Auth::guard('affiliate')->user()->id;
            $payment_amounts = AffiliatePayment::where('affiliate_id',$affiliate_id)->get();
            $totalTransectionAmount =collect($payment_amounts)->sum('affiliate_account');
        }else{
            $sub_affiliate_id = Auth::guard('affiliate')->user()->id;
            $payment_amounts = AffiliatePayment::where('Sub_affiliate_id',$sub_affiliate_id)->get();
            $totalTransectionAmount =collect($payment_amounts)->sum('Sub_affiliate_account');
        }
        return view('affiliate.index',compact('totalTransectionAmount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email|unique:affiliate',
            'promo_code' => 'required|unique:affiliate',
            'affiliate_ref_id' => 'required',
            'password' => 'required'
        ]);
        $data = request(['name', 'email','promo_code','affiliate_ref_id', 'password']);
        $data['password'] = Hash::make($data['password']);
        Affiliate::create($data);
        return redirect('/affiliate')->with('success');
    }

    public function user()
    {
        $affiliate_promo_code = Auth::guard('affiliate')->user()->promo_code;
        $UserInfos=User::where('promo_code',$affiliate_promo_code)->get();
        return view('affiliate.user', compact('UserInfos'));
    }

    public function sub_affiliate()
    {
        $affiliate_id = Auth::guard('affiliate')->user()->id;
        $SubAffiliateInfos=Affiliate::where('affiliate_ref_id',$affiliate_id)->get();
        return view('affiliate.sub_affiliate', compact('SubAffiliateInfos'));
    }

    public function paymentHistory()
    {
        if(Auth::guard('affiliate')->user() and empty(Auth::guard('affiliate')->user()->affiliate_ref_id)){
            $affiliate_id = Auth::guard('affiliate')->user()->id;
            $payment_details = AffiliatePayment::where('affiliate_id',$affiliate_id)->latest()->get();
        }else{
            $sub_affiliate_id = Auth::guard('affiliate')->user()->id;
            $payment_details = AffiliatePayment::where('Sub_affiliate_id',$sub_affiliate_id)->latest()->get();
        }

        return view('affiliate.paymenthistory',compact('payment_details'));
    }


}
