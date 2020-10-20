@extends('layout.layout')

@section('content')
<div class="section">
	<div class="col-md-12 text-center">
		<img src="{{asset($product->img)}}" width="200">
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="billing-details">
					<form method="POST" action="{{ route('products.update',$product->id) }}" enctype="multipart/form-data">
						@csrf
						@method('PATCH')
						<br>
						<div class="form-group">
                            <div class="col-md-6">
								<h4 class="product-name">Imagen</h4>
								<input type="file" class="input" name="img" value="">
								@error('img')
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong style="color:#D10024">{{ $message }}</strong>
	                                    </span>
	                            @enderror
							</div>
                            <div class="col-md-6">
								<h4 class="product-name">Nombre*</h4>
								<input class="input" type="text" name="name" value="{{$product->name}}">
								@error('name')
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong style="color:#D10024">{{ $message }}</strong>
	                                    </span>
	                            @enderror
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-6">
								<h4 class="product-name">Precio*</h4>
								<input class="input" type="text" name="price" value="{{$product->price}}">
								@error('price')
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong style="color:#D10024">{{ $message }}</strong>
	                                    </span>
	                            @enderror
                        	</div>
                        	<div class="col-md-6">
								<h4 class="product-name">Categoria*</h4>
								<select class="input" name="category">
	                                	<option value="">Seleccionar...</option>
	                                @foreach ($categories as $category)
	                                    <option value="{{ $category->id }}"{{$product->categories_id == $category->id ? 'selected' : ''}}>{{ $category->name }}</option>
	                                @endforeach
	                            </select>
								@error('category')
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong style="color:#D10024">{{ $message }}</strong>
	                                    </span>
	                            @enderror
	                        </div>
						</div>
						<div class="form-group">
							<div class="col-md-6">
								<h4 class="product-name">Detalle*</h4>
								<textarea class="input" name="detail">{{$product->detail}}"</textarea>
								@error('detail')
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong style="color:#D10024">{{ $message }}</strong>
	                                    </span>
	                            @enderror
                        	</div>
	                        <div class="col-md-6">
	                        	<br><br>
		            			<button class="cart-bottom" style="background-color:#333">Actualizar</button>
		            		</div>
	            		</div>
	            	</form>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
