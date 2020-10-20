@extends('layout.layout') 

@section('content')  

<div class="section">
	<div class="container">
		<div class="row">
			<div class="col-md-7">
				<div class="billing-details">
					<form method="POST" action="{{ route('pasarella.insert-shipping-info',$user->id) }}">
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
							<select class="input" name="department" id="department" onchange="findCities(this.value)">
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
	            			<button class="cart-bottom" style="background-color:#333">Enviar</button>&nbsp;&nbsp;&nbsp;&nbsp;
	            			<a onclick="window.location.href='/'" style="color:#ef233c; cursor: pointer;">SEGUIR COMPRANDO&nbsp;<i class="fa fa-arrow-circle-right"></i></a>
	            		</div>
	            	</form>
				</div>
			</div>
				@include('detailOrder')
		</div>
	</div>
@endsection
@push('custom-scripts')
    <script src="{{asset('js/order.js')}}"></script>
@endpush
