@extends('layout.layout') 

@section('content') 
<div class="section">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="billing-details">
					<form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
						@csrf
						<br>
						<div class="form-group">
                            <div class="col-md-6">
								<h4 class="product-name">Imagen*</h4>
								<input type="file" class="input" name="img" value="">
								@error('img')
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong style="color:#D10024">{{ $message }}</strong>
	                                    </span>
	                            @enderror
							</div>
                            <div class="col-md-6">
								<h4 class="product-name">Nombre*</h4>
								<input class="input" type="text" name="name" value="{{old('name')}}">
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
								<input class="input" type="number" name="price" value="{{old('price')}}">
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
	                                    <option value="{{ $category->id }}"{{old('category') == $category->id ? 'selected' : ''}}>{{ $category->name }}</option>
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
								<textarea class="input" name="detail">{{old('detail')}}</textarea>
								@error('detail')
	                                    <span class="invalid-feedback" role="alert">
	                                        <strong style="color:#D10024">{{ $message }}</strong>
	                                    </span>
	                            @enderror
                        	</div>
	                        <div class="col-md-6">
	                        	<br><br>
		            			<button class="cart-bottom" style="background-color:#333">Crear</button>
		            		</div>
	            		</div>
	            	</form>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
