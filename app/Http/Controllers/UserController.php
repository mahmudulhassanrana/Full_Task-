<?php

namespace App\Http\Controllers;
use App\User;
use Auth;
use App\Affiliate;
use App\AffiliatePayment;
use App\UserPayment;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $User_id = Auth::guard('web')->user()->id;
        $payment_amounts = UserPayment::where('user_id',$User_id)->get();
        $totalTransectionAmount =collect($payment_amounts)->sum('amount');
        return view('user.index',compact('totalTransectionAmount'));
    }

    public function userPayment()
    {
        $User_id = Auth::guard('web')->user()->id;
        $payment_details = UserPayment::where('user_id',$User_id)->latest()->get();
        return view('user.userPayment',compact('payment_details'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function UserAddMoney()
    {
        $this->validate(request(), [
            'amount' => 'required',
        ]);
        $AddMoney = request(['amount','user_id']);
        UserPayment::create($AddMoney);
        $User_id = Auth::guard('web')->user()->id;
        $payment_details = UserPayment::where('user_id',$User_id)->latest()->first();
        $user_details=User::where('id',$payment_details->user_id)->first();
        if(!empty($user_details->promo_code)){
            $commission_user_details=Affiliate::where('promo_code',$user_details->promo_code)->first();
            if(!empty($commission_user_details->affiliate_ref_id)){
                $affiliate_account=$payment_details->amount * (10 / 100);
                $sub_affiliate_account=$payment_details->amount * (20 / 100);
                $affiliate_payment_dataset=[
                    'user_id'=>$user_details->id,
                    'affiliate_id'=>$commission_user_details->affiliate_ref_id,
                    'Sub_affiliate_id' =>$commission_user_details->id,
                    'affiliate_account' =>$affiliate_account,
                    'Sub_affiliate_account'=>$sub_affiliate_account

                 ];
            }else{
                $affiliate_account=$payment_details->amount * (30 / 100);
                $affiliate_payment_dataset=[
                    'user_id'=>$user_details->id,
                    'affiliate_id'=>$commission_user_details->id,
                    'affiliate_account' =>$affiliate_account,

                 ];

            }
            AffiliatePayment::create($affiliate_payment_dataset);
        }

        return redirect('/user')->with('success');
    }

    public function store()
    {
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'dob' => '',
            'promo_code' =>'',
            'password' => 'required'
        ]);
        $data = request(['name', 'email','promo_code','dob', 'password']);
        $data['password'] = Hash::make($data['password']);
        User::create($data);
        return redirect('/')->with('success');
    }


}
