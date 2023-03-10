@extends('layouts_new.master')
@section('content')
<section class="section">
    <div class="row">
        <div class="col-lg-6">
            <h2>Affiliate Information</h2>
            <!-- Basic Modal -->
            <a type="button" class="btn btn-primary" data-bs-toggle="modal"  data-bs-target="#affiliate_create">
              + Add user address
            </a> <hr>

            <table >
                <thead>
                    <tr>
                        <th>Affiliate Name </th>
                        <th>Affiliate Email </th>
                        <th>Promo Code </th>
                    </tr>
                </thead>
                @foreach($AffiliateInfos as $AffiliateInfo)
                <tbody class="m-1">
                    <tr>
                        <td class="m-2">{{$AffiliateInfo->name}} </td>
                        <td class="m-1">{{$AffiliateInfo->email}} </td>
                        <td class="m-1">{{$AffiliateInfo->promo_code}} </td>
                    </tr>

                </tbody>
                @endforeach
            </table>

            <div class="modal fade" id="affiliate_create" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Create Affiliate</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Floating Labels Form -->
                            <form class="row g-3"  method="POST" action="{{ url('admin/affiliate_create') }}">
                                @csrf
                                <div>
                                    <div class="form-floating">
                                        <input name="name" type="text" class="form-control" id="floatingName"
                                            placeholder="Affiliate Name" required>
                                        <label for="floatingName">Affiliate Name</label>
                                    </div>
                                </div>
                                <div>
                                    <div class="form-floating">
                                        <input name="email" type="email" class="form-control" id="AffiliateCreateEmail"
                                            placeholder="Email" required>
                                        <label for="floatingEmail">Email</label>
                                    </div>
                                </div>
                                <div>
                                    <div class="form-floating">
                                        <input name="promo_code" type="promo_code" class="form-control" id="AffiliatePromoCode"
                                            placeholder="Promo Code" required>
                                        <label for="phonenumber">Promo Code</label>
                                    </div>
                                </div>
                                <div>
                                    <div class="form-floating">
                                        <input name="password" type="password" class="form-control" id="password"
                                            placeholder="password"required>
                                        <label for="floatingEmail">password</label>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary" id="SubmitAffiliate">Submit</button>
                                    <button type="reset" class="btn btn-secondary">Reset</button>
                                </div>
                            </form><!-- End floating Labels Form -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Basic Modal-->
        </div>
    </div>
</section>
@endsection
