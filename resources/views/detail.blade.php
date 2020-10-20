@extends('layout.layout')

@section('content')

		<div class="section">
			<div class="container">
				<div class="row">
					<div class="col-md-5 col-md-push-2">
						<div id="product-main-img">
							<div class="product-preview">
								<img src="{{asset($product->img)}}" alt="">
							</div>

							<div class="product-preview">
								<img src="{{asset($product->img)}}" alt="">
							</div>

							<div class="product-preview">
								<img src="{{asset($product->img)}}" alt="">
							</div>

							<div class="product-preview">
								<img src="{{asset($product->img)}}" alt="">
							</div>

							<div class="product-preview">
								<img src="{{asset($product->img)}}" alt="">
							</div>

						</div>
					</div>
					<!-- /Product main img -->

					<!-- Product thumb imgs -->
					<div class="col-md-2  col-md-pull-5">
						<div id="product-imgs">
							<div class="product-preview">
								<img src="{{asset($product->img)}}" alt="">
							</div>

							<div class="product-preview">
								<img src="{{asset($product->img)}}" alt="">
							</div>

							<div class="product-preview">
								<img src="{{asset($product->img)}}" alt="">
							</div>

							<div class="product-preview">
								<img src="{{asset($product->img)}}" alt="">
							</div>
						</div>
					</div>
					<!-- /Product thumb imgs -->

					<!-- Product details -->
					<div class="col-md-5">
						<div class="product-details">
							<h2 class="product-name">{{$product->name}}</h2>

							<div>
								<h3 class="product-price">${{number_format($product->price)}} <del class="product-old-price">${{number_format($product->price + 100000)}}</del></h3>
							</div>
							<p>{{$product->detail}}</p>

							<div class="add-to-cart">
								<!-- <div class="qty-label">
									Cantidad	
									<div class="input-number">
										<input type="number">
										<span class="qty-up">+</span>
										<span class="qty-down">-</span>
									</div>
								</div> -->
								<button class="add-to-cart-btn" onclick="addCart(0)"><i class="fa fa-shopping-cart"></i>Agregar al carrito</button>
							</div>

							<ul class="product-links">
								<li>Category:</li>
								<li><a href="#">{{$product->category->name}}</a></li>
							</ul>

							<ul class="product-links">
								<li><a onclick="window.location.href='/'" style="color:#ef233c; cursor: pointer;">SEGUIR COMPRANDO&nbsp;<i class="fa fa-arrow-circle-right"></i></a></li>
								<!-- <li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-instagram"></i></a></li> -->
							</ul>

						</div>
					</div>
	
				</div>
			</div>
		</div>


@endsection
