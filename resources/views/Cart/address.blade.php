@extends('App\app')
@section('content')

<!-- Checkout Start -->
<div class="checkout">
    <div class="container-fluid"> 
        <div class="row">
            <div class="col-lg-8">
                <div class="checkout-inner">
                    <div class="billing-address">
                        <h2>Billing Address</h2>
                        <form action="{{url('Addresses',Auth::user()->id)}}" method="POST">
                            {{ csrf_field() }}
                        <div class="row">
                            
                            <div class="col-md-6">
                                <label>Mobile No</label>
                                <input class="form-control" type="text" placeholder="Mobile No" name="mobile">
                            </div>
                            <div class="col-md-12">
                                <label>Address</label>
                                <input class="form-control" type="text" placeholder="Address" name="address">
                            </div>
                            <div class="col-md-6">
                                <label>Country</label>
                                <select class="custom-select" name="country">
                                    <option selected value="United States">United States</option>
                                    <option value="Afghanistan">Afghanistan</option>
                                    <option value="Albania">Albania</option>
                                    <option value="Algeria">Algeria</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label>City</label>
                                <input class="form-control" type="text" placeholder="City" name="city">
                            </div>
                            
                            
                        </div>
                        <button  type="submit"><i class="fas fa-edit">save</i></button>
                        </form>
                    </div>

                    
                </div>
            </div>
            
        </div>
    </div>
</div>
<!-- Checkout End -->
@endsection 