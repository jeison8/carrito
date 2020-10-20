@extends('layout.layout') 

@section('content')  

<div class="section">
	<div class="container">
		<form method="POST" action="{{ route('pasarella.insert-shipping-info',$user->id) }}">
		<div class="row">
			<div class="col-md-7">
				<div class="billing-details">
						@csrf
						@method('PATCH') 
						<div id="inputs">
							<input type="hidden" name="total" id="total">
							<input type="hidden" name="number_articles" id="number_articles">
						</div>

						<h3 class="title">DATOS DE ENVIO</h3>
						<br>
						<div class="form-group">
							<h4 class="product-name">Nombre*</h4>
							<input class="input" type="text" name="name" value="{{$user->name}}">
							@error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color:#D10024">{{ $message }}</strong>
                                    </span>
                            @enderror
						</div>
						<div class="form-group">
							<h4 class="product-name">Correo*</h4>
							<input class="input" type="email" name="email" value="{{$user->email}}">
							@error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color:#D10024">{{ $message }}</strong>
                                    </span>
                            @enderror
						</div>
						<div class="form-group">
							<h4 class="product-name">Cedula*</h4>
							<input class="input" type="text" name="document" value="{{$user->document}}">
							@error('document')
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color:#D10024">{{ $message }}</strong>
                                    </span>
                            @enderror
						</div>
						<div class="form-group">
							<h4 class="product-name">Direccion*</h4>
							<input class="input" type="text" name="address" value="{{$user->address}}">
							@error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color:#D10024">{{ $message }}</strong>
                                    </span>
                            @enderror
						</div>
						<div class="form-group">
							<h4 class="product-name">Departamento*</h4>
							<select class="input" name="department" id="department" onchange="findCitiesReorder(this.value)">
                                	<option value="">Seleccionar...</option>
                                @foreach ($departments as $department)
                                    <option value="{{ $department->id }}" {{$user->departments_id == $department->id ? 'selected' : ''}}>{{ ucfirst(mb_strtolower($department->name)) }}</option>
                                @endforeach
                            </select>
							@error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color:#D10024">{{ $message }}</strong>
                                    </span>
                            @enderror
						</div>
						<div class="form-group">
							<h4 class="product-name">Ciudad*</h4>
							<select class="input" name="city" id="city">
								<option value="{{ $user->cities_id }}"></option>
                            </select>
							@error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color:#D10024">{{ $message }}</strong>
                                    </span>
                            @enderror
						</div>
						<div class="form-group">
							<h4 class="product-name">Telefono*</h4>
							<input class="input" type="tel" name="phone" value="{{ $user->phone }}">
							@error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong style="color:#D10024">{{ $message }}</strong>
                                    </span>
                            @enderror
						</div>	
						<div class="form-group">
	            			<button class="cart-bottom" style="background-color:#333">Ordenar</button>&nbsp;&nbsp;&nbsp;&nbsp;
	            			<a onclick="window.location.href='/'" style="color:#ef233c; cursor: pointer;">SEGUIR COMPRANDO&nbsp;<i class="fa fa-arrow-circle-right"></i></a>
	            		</div>
				</div>
			</div>
				<div class="col-md-5 order-details">
					<div class="section-title text-center">
						<h3 class="title">RESUMEN DEL PEDIDO</h3>
					</div>
					<div class="order-summary">
						<div class="order-products">

								<div id="myCarousel" class="carousel slide" data-ride="carousel" style="height: 200px;"> 
								  <div class="carousel-inner" id="inner">
								  	@foreach($order->products_id as $key =>  $id)
								  	<div class="{{$key == 0 ? 'item active' : 'item'}}">
									   <table table table-responsive>
											<tr>
												<?php $product = App\Product::where('id',$id)->first(); ?>
												<td>
									          		<img src="{{asset($product->img)}}" width="180px">
									          		<input type="hidden" name="products[{{$key}}][]" value="{{$product->id}}">
									          		<input type="hidden" name="products[{{$key}}][]" value="{{$product->name}}">
									          		<input type="hidden" name="products[{{$key}}][]" value="{{$product->price}}">
									          	</td>
									          	<td>
									              <h4 class="product-name">{{$product->name}}"</h4>
									              <h4 class="product-name">${{number_format($product->price,0,'.','.')}}</h4>
									              <small>Cantidad: 1</small>
									          	</td>
									        </tr>
									    </table>
									</div>
								    @endforeach
								  </div>
								  <ol class="carousel-indicators" id="indicators">
								 
								  </ol>
								  <a class="left carousel-control" href="#myCarousel" data-slide="prev" style="background-image:none;">
								    <span class="fa fa-chevron-left" style="color:#D10024;"></span>
								  </a>
								  <a class="right carousel-control" href="#myCarousel" data-slide="next" style="background-image:none;">
								    <span class="fa fa-chevron-right" style="color:#D10024;"></span>
								  </a>
								</div>

						</div>
						<div class="order-col">
							<input type="hidden" name="number_articles" value="{{count($order->products_id)}}">
							<div><span id="articlesNumber">{{count($order->products_id)}}</span> Articulo(s) seleccionado(s)</div>
							<div id="articlesPrice">${{number_format($order->price,0, '.','.')}}</div>
						</div>
						<div class="order-col">
							<div>Envio</div>
							<div><strong>Gratis</strong></div>
						</div>
						<div class="order-col">
							<div><strong>TOTAL</strong></div>
							<input type="hidden" name="total" value="{{number_format($order->price,0, '.','.')}}">
							<div><strong class="order-total" id="orderTotal">${{number_format($order->price,0, '.','.')}}</strong></div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
@endsection
@push('custom-scripts')
    <script src="{{asset('js/reOrder.js')}}"></script>
@endpush
