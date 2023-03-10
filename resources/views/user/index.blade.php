@extends('layouts_new.master')
@section('content')
<section class="section">
    <div class="row">
        <div class="col-lg-6">
            <h2>User Transection Dashboard</h2>
            <!-- Basic Modal -->
            <a type="button" class="btn btn-primary" data-bs-toggle="modal"  data-bs-target="#user_add_money">
              + Add Money
            </a> <hr>
            <div class="modal fade" id="user_add_money" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Add Money</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Floating Labels Form -->
                            <form class="row g-3"  method="POST" action="{{ url('/user/add_money') }}">
                                @csrf
                                <div>
                                    {{-- onkeyup="if(this.value<0){this.value= this.value * -1}" --}}
                                    <div class="form-floating">
                                        <input name="amount"  class="form-control" id="TransectionAmount"
                                            placeholder="Transection Amount"  required>
                                        <label for="floatingName">Transection Amount</label>
                                    </div>
                                    <input name="user_id" value="{{Auth::guard('web')->user()->id}}" hidden>
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
