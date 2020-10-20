@extends('layout.layout') 

@section('content') 

<div class="section">
	<div class="container">
	   <div class="row">
      <div class="col-md-12">
        <div class="card card-signin my-5">
            <a href="{{route('products.create')}}">Crear producto <i class="fa fa-plus" style="color: #D10024;"></i></a>
          <div class="card-body text-center">
            <h4>Lista de Productos</h4>  
            <br>
            <div class="table-responsive">
              <table class="table table-hover table-bordered">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">Imagen</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Detalle</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Acciones</th>
                  </tr>
                </thead>
                <tbody>
                	@foreach($products as $product) 		
                  <tr>
                    <td><img src="{{asset($product->img)}}" width="100px"></td>
          				  <td>{{$product->name}}</td>
          				  <td>${{number_format($product->price)}}</td>
          				  <td>{{$product->detail}}</td>
          				  <td>{{$product->category->name}}</td>
          				  <td>
          				  	<a href="{{route('products.edit',$product->id)}}"><i class="fa fa-pencil" style="color: #333;"></i></a>
          				  	<a href="{{route('products.destroy',$product->id)}}"><i class="fa fa-trash" style="color: #D10024;"></i></a>
          				  </td>
                  </tr>
                	@endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    {{ $products->links() }}
  </div>
</div>

@endsection
