@extends('layouts.app')
	@section('title')
		Vegefood - Shop
	@endsection
	@section('content')
    <div class="hero-wrap hero-bread" style="background-image: url({{asset('frontend/images/bg_1.jpg')}});">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Products</span></p>
            <h1 class="mb-0 bread">Products</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section">
    	<div class="container">
    		<div class="row justify-content-center">
    			<div class="col-md-10 mb-5 text-center">
    				<ul class="product-category">
						<li><a href="{{ url('/shop')}}" >All</a></li>
						@foreach ($categories as $category)
							<li><a href="{{ url('/select_product_by_category/'.$category->category_name)}}">{{$category->category_name}}</a></li>
						@endforeach
						
					</ul>
    			</div>
    		</div>
    		<div class="row">
				@foreach ($products as $product)
    			<div class="col-md-6 col-lg-3 ftco-animate">
    				<div class="product">
					<a href="#" class="img-prod"><img class="img-fluid" src="/storage/cover_images/{{ $product->product_image }}" alt="Colorlib Template">
    						<span class="status">{{ $product->product_category }}</span>
    						<div class="overlay"></div>
    					</a>
    					<div class="text py-3 pb-4 px-3 text-center">
    						<h3><a href="#"></a></h3>
    						<div class="d-flex">
    							<div class="pricing">
		    						<p class="price"><span class="mr-2 price-dc"></span><span class="price-sale">$ {{ $product->product_price }}</span></p>
		    					</div>
	    					</div>
	    					<div class="bottom-area d-flex px-3">
	    						<div class="m-auto d-flex">
	    							{{-- <a href="#" class="add-to-cart d-flex justify-content-center align-items-center text-center">
	    								<span><i class="ion-ios-menu"></i></span>
	    							</a> --}}
	    							<a href="{{url('/addToCart/'.$product->id)}}" class="buy-now d-flex justify-content-center align-items-center mx-1">
	    								<span><i class="ion-ios-cart"></i></span>
	    							</a>
	    							{{-- <a href="#" class="heart d-flex justify-content-center align-items-center ">
	    								<span><i class="ion-ios-heart"></i></span>
	    							</a> --}}
    							</div>
    						</div>
    					</div>
    				</div>
				</div>
				@endforeach
    		</div>
    		<div class="row mt-5">
          <div class="col text-center">
            <div class="block-27">
                {{ $products->links('pagination.default')}}
            </div>
          </div>
        </div>
    	</div>
    </section>

	
    
  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>
@endsection
    
  </body>
</html>