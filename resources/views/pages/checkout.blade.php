@extends('layouts.app')

@section('title')
	Checkout
@endsection

@section('content')
   

<div class="hero-wrap hero-bread" style="background-image: url('frontend/images/bg_1.jpg');">
    <div class="container">
      <div class="row no-gutters slider-text align-items-center justify-content-center">
        <div class="col-md-9 ftco-animate text-center">
            <p class="breadcrumbs"><span class="mr-2"><a href="{{ url('/')}}">Home</a></span> <span>Checkout</span></p>
          <h1 class="mb-0 bread">Checkout</h1>
        </div>
      </div>
    </div>
  </div>

  <section class="ftco-section">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-xl-7 ftco-animate">
          <?php
                        $error = Session::get('error');
                    ?>
                    
                    @if($error)
                        <p class="alert alert-danger">
                            <?php
                            echo $error;
                            Session::put('error', null);
                            ?>
                        </p>
                    @endif
        		{!! Form::open(['action' => 'ProductController@postCheckout', 'method' => 'POST', 'class' => 'form-horizontal', 'id' => 'checkout-form', 'enctype' => 'multipart/form-data']) !!}
        		<fieldset>
                    <h4>Total price : $ {{$totalPrice}}</h4>
                    <h3 class="mb-4 billing-heading">Billing Details</h3>
                <div class="row align-items-end">
					<div class="col-md-12">
						<div class="form-group">
							<label for="firstname">Name</label>
							<input type="text" class="form-control" name="name" placeholder="">
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<label for="firstname">Address</label>
							<input type="text" class="form-control" name="address" placeholder="">
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<label for="firstname">Hold Card name</label>
							<input type="text" id="card-name" class="form-control" name="card_name" placeholder="">
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<label for="firstname">Card number</label>
							<input type="text" id="card-number" class="form-control" placeholder="">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
						<label for="streetaddress">Expiration Month</label>
						<input type="text" id="card-expiry-month" class="form-control">
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="streetaddress">Expiration Year</label>
						<input type="text" id="card-expiry-year" class="form-control" >
					</div>
				</div>
				<div class="col-md-12">
					<div class="form-group">
						<label for="firstname">CVC</label>
						<input type="text" id="card-cvc" class="form-control"  placeholder="">
					</div>
				</div>  
              </div>
              {{Form::submit('Buy now', ['class' => 'btn btn-success'])}}
            </fieldset>
            {{Form::close()}}
        </div>
      </div>
    </div>
  </section> <!-- .section -->

<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

@endsection
@section('scripts')
  <script src="https://js.stripe.com/v2/"></script>
  <script src="src/js/checkout.js"></script>
@endsection