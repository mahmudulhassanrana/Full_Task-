@extends('layouts_new.master')
@section('content')
<section class="section">
    <div class="row">
        <div class="col-lg-6">
            <h2>Transection Information</h2>
            <hr>
            <table >
                <thead>
                    <tr>
                        <th>Transection Amount</th>
                        <th>Transection Date</th>
                    </tr>
                </thead>
                @foreach($payment_details as $payment_detail)
                <tbody class="m-1">
                    <tr>
                        @if (Auth::guard('affiliate')->user() and empty(Auth::guard('affiliate')->user()->affiliate_ref_id))
                        <td class="m-2">{{$payment_detail->affiliate_account}} </td>
                        <td class="m-1">{{$payment_detail->created_at}} </td>
                        @else
                        <td class="m-2">{{$payment_detail->Sub_affiliate_account}} </td>
                        <td class="m-1">{{$payment_detail->created_at}} </td>
                        @endif
                    </tr>
                </tbody>
                @endforeach
            </table>
            <!-- End Basic Modal-->
        </div>
    </div>
</section>
@endsection
