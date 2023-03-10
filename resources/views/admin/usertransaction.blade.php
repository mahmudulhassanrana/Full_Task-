@extends('layouts_new.master')
@section('content')
<section class="section">
    <div class="row">
        <div class="col-lg-6">
            <h2>User Information</h2>
            <hr>
            <table >
                <thead>
                    <tr>
                        <th>User Name </th>
                        <th>User Email </th>
                        <th>Date Of Birth </th>
                    </tr>
                </thead>
                <tbody class="m-1">
                    <tr>
                        <td class="m-1">{{$User['name']}} </td>
                        <td class="m-1">{{$User['email']}} </td>
                        <td class="m-1">{{$User['dob']}} </td>
                    </tr>
                </tbody>
            </table>
            <!-- End Basic Modal-->
        </div>
        <div class="col-lg-6">
            <h2>User Information</h2>
            <hr>
            <table >
                <thead>
                    <tr>
                        <th>Transection Amount</th>
                        <th>Transection Date</th>
                    </tr>
                </thead>
                @foreach($user_payment_details as $payment_detail)
                <tbody class="m-1">
                    <tr>
                        <td class="m-2">{{$payment_detail->amount}} </td>
                        <td class="m-1">{{$payment_detail->created_at}} </td>
                    </tr>
                </tbody>
                @endforeach
            </table>
            <!-- End Basic Modal-->
        </div>
        <div class="col-lg-6">
            <h2>Transection Information</h2>
            <hr>
            <table >
                <thead>
                    <tr>
                        <th>Affiliate Commission Amount</th>
                        <th>Sub Affiliate Commission Amount</th>
                        <th>Transection Date</th>
                    </tr>
                </thead>
                @foreach($commission_payment_details as $payment_detail)
                <tbody class="m-1">
                    <tr>
                        <td class="m-2">{{$payment_detail->affiliate_account}} </td>
                        <td class="m-2">{{$payment_detail->Sub_affiliate_account}} </td>
                        <td class="m-1">{{$payment_detail->created_at}} </td>
                    </tr>
                </tbody>
                @endforeach
            </table>
            <!-- End Basic Modal-->
        </div>
    </div>
</section>
@endsection
