@extends('layouts_new.master')
@section('content')
<section class="section">
    <div class="row">
        <div class="col-lg-6">
            @if (Auth::guard('affiliate')->user() and empty(Auth::guard('affiliate')->user()->affiliate_ref_id))
            <h2>Affiliate Commission Dashboard</h2>
            <!-- Basic Modal -->
            <a type="button" class="btn btn-primary" data-bs-toggle="modal"  data-bs-target="#sub_affiliate_create">
              + Add Sub-Affiliate
            </a>
            @else
            <h2>Sub Affiliate Commission Dashboard</h2>
            <!-- Basic Modal -->
            @endif
            <hr>
            <div class="modal fade" id="sub_affiliate_create" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Create Sub-Affiliate</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Floating Labels Form -->
                            <form class="row g-3"  method="POST" action="{{ url('/affiliate/sub_affiliate_create') }}">
                                @csrf
                                <div>
                                    <div class="form-floating">
                                        <input name="name" type="text" class="form-control" id="floatingName"
                                            placeholder="Affiliate Name" required>
                                        <label for="floatingName">Sub-Affiliate Name</label>
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
                                    <input name="affiliate_ref_id" value="{{Auth::guard('affiliate')->user()->id}}" hidden>
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

<section class="section dashboard">
    <div class="row">

      <!-- Left side columns -->
      <div class="col-lg-8">
        <div class="row">

          <!-- Sales Card -->
          <div class="col-xxl-4 col-md-6">
            <div class="card info-card sales-card">
              <div class="card-body">
                <h5 class="card-title">Total Transection Amount</h5>
                <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-currency-dollar"></i>
                      </div>
                  <div class="ps-3">
                     <h6>{{$totalTransectionAmount}}</h6>
                  </div>
                </div>
              </div>

            </div>
          </div><!-- End Sales Card -->

          <!-- Customers Card -->

        </div>
      </div><!-- End Left side columns -->

    </div>
  </section>


@endsection
