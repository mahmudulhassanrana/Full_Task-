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
                @foreach($UserInfos as $UserInfo)
                <tbody class="m-1">
                    <tr>
                        <td class="m-2">{{$UserInfo->name}} </td>
                        <td class="m-1">{{$UserInfo->email}} </td>
                        <td class="m-1">{{$UserInfo->dob}} </td>
                    </tr>
                </tbody>
                @endforeach
            </table>
            <!-- End Basic Modal-->
        </div>
    </div>
</section>
@endsection
