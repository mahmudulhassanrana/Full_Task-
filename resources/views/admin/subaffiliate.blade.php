@extends('layouts_new.master')
@section('content')
<section class="section">
    <div class="row">
        <div class="col-lg-6">
            <h2>Sub-Affiliate Information</h2>
            <hr>

            <table >
                <thead>
                    <tr>
                        <th>Sub-Affiliate Name </th>
                        <th>Sub-Affiliate Email </th>
                        <th>Promo Code </th>
                    </tr>
                </thead>
                @foreach($SubAffiliateInfos as $SubAffiliateInfo)
                <tbody class="m-1">
                    <tr>
                        <td class="m-2">{{$SubAffiliateInfo->name}} </td>
                        <td class="m-1">{{$SubAffiliateInfo->email}} </td>
                        <td class="m-1">{{$SubAffiliateInfo->promo_code}} </td>
                    </tr>

                </tbody>
                @endforeach
            </table>
            <!-- End Basic Modal-->
        </div>
    </div>
</section>
@endsection
