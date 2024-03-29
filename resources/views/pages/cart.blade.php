
@extends('layouts.app')

@section('title')
    Vegefood - Cart
@endsection

@section('content')
<!-- END nav -->

<div class="hero-wrap hero-bread" style="background-image: url('frontend/images/bg_1.jpg');">
  <div class="container">
    <div class="row no-gutters slider-text align-items-center justify-content-center">
      <div class="col-md-9 ftco-animate text-center">
        <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Cart</span></p>
        <h1 class="mb-0 bread">My Cart</h1>
      </div>
    </div>
  </div>
</div>
@if (Session::has('cart'))
<section class="ftco-section ftco-cart">
  <div class="container">
    <div class="row">
      <div class="col-md-12 ftco-animate">
        <div class="cart-list">
          <table class="table">
            <thead class="thead-primary">
              <tr class="text-center">
                <th>&nbsp;</th>
                <th>&nbsp;</th>
                <th>Product name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($products as $product)
              <tr class="text-center">
                <td class="product-remove"><a href="{{ url('/removeItem/'.$product['product_id'])}}"><span class="ion-ios-close"></span></a></td>
                
                <td class="image-prod"><div class="img" style="background-image:url({{asset('storage/cover_images/'.$product['product_image'])}});"></div></td>
                
                <td class="product-name">
                  <h3>{{ $product['product_name'] }}</h3>
                  <p>Far far away, behind the word mountains, far from the countries</p>
                </td>
                
            <td class="price">${{ $product['product_price'] }}</td>
            <td class="quantity">
              {!! Form::open(['action' => 'PagesController@update_Qty', 'method' => 'POST', 'class' => 'form-horizontal', 'enctype' => 'multipart/form-data']) !!}
                <fieldset>
              <div class="input-group mb-3">
              <input type="number" name="quantity" class="quantity form-control input-number" value="{{$product['qty']}}" min="1" max="100">
              <input type="hidden" name="id" class="quantity form-control input-number" value="{{$product['product_id']}}">
              </div>
              {{Form::submit('Update', ['class' => 'btn btn-success'])}} 
  
                </fieldset>
              {{Form::close()}}
            </td>
                
              
                </td>
                
            <td class="total">${{$product['product_price']*$product['qty']}}</td>
              </tr><!-- END TR-->
            @endforeach<!-- END TR-->
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="row justify-content-end">
      {{-- <div class="col-lg-4 mt-5 cart-wrap ftco-animate">
        <div class="cart-total mb-3">
          <h3>Coupon Code</h3>
          <p>Enter your coupon code if you have one</p>
          <form action="#" class="info">
            <div class="form-group">
              <label for="">Coupon code</label>
              <input type="text" class="form-control text-left px-3" placeholder="">
            </div>
          </form>
        </div>
        <p><a href="checkout.html" class="btn btn-primary py-3 px-4">Apply Coupon</a></p>
      </div>
      <div class="col-lg-4 mt-5 cart-wrap ftco-animate">
        <div class="cart-total mb-3">
          <h3>Estimate shipping and tax</h3>
          <p>Enter your destination to get a shipping estimate</p>
          <form action="#" class="info">
            <div class="form-group">
              <label for="">Country</label>
              <input type="text" class="form-control text-left px-3" placeholder="">
            </div>
            <div class="form-group">
              <label for="country">State/Province</label>
              <input type="text" class="form-control text-left px-3" placeholder="">
            </div>
            <div class="form-group">
              <label for="country">Zip/Postal Code</label>
              <input type="text" class="form-control text-left px-3" placeholder="">
            </div>
          </form>
        </div>
        <p><a href="checkout.html" class="btn btn-primary py-3 px-4">Estimate</a></p>
      </div> --}}
      <div class="col-lg-4 mt-5 cart-wrap ftco-animate">
        <div class="cart-total mb-3">
          <h3>Cart Totals</h3>
          <p class="d-flex">
            <span>Subtotal</span>
          <span>${{$totalPrice}}</span>
          </p>
          <p class="d-flex">
            <span>Delivery</span>
            <span>$0.00</span>
          </p>
          <p class="d-flex">
            <span>Discount</span>
            <span>$0.00</span>
          </p>
          <hr>
          <p class="d-flex total-price">
            <span>Total</span>
            <span>${{$totalPrice}}</span>
          </p>
        </div>
        <p><a href="{{ url('checkout')}}" class="btn btn-primary py-3 px-4">Proceed to Checkout</a></p>
      </div>
    </div>
  </div>
  @else
  @endif
</section>

<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>
@endsection
<script>
$(document).ready(function(){

var quantitiy=0;
   $('.quantity-right-plus').click(function(e){
        
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        var quantity = parseInt($('#quantity').val());
        
        // If is not undefined
            
            $('#quantity').val(quantity + 1);

          
            // Increment
        
    });

     $('.quantity-left-minus').click(function(e){
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        var quantity = parseInt($('#quantity').val());
        
        // If is not undefined
      
            // Increment
            if(quantity>0){
            $('#quantity').val(quantity - 1);
            }
    });
    
});
</script>

</body>
</html>