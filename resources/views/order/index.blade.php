@extends('layout.layout') 

@section('content') 

<div class="section">
	<div class="container">
	   <div class="row">
      <div class="col-md-12">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h4>Historial de pedidos</h4>  
            <br>
            <div class="table-responsive">
              <table class="table table-hover table-bordered">
                <thead class="thead-dark">
                  <tr>
                    <th width="100">Fecha</th>
                    <th width="100">Pedido</th>
                    <th width="500">Productos</th>
                    <th>Estado</th>
                    <th width="100">Total</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
                <tbody>
                	@foreach($orders as $key => $order) 		
                  <tr>
          				  <td>{{ date('d-m-Y', strtotime($order->created_at))}}</td>
                    <td>{{ $order->requestId}}</td>
                    <td>
                      @foreach($order->products_id as $id)   
                        <?php $product = App\Product::where('id',$id)->first(); ?>
                        <img src="{{asset($product['img'])}}" width="50">
                        {{$product['name']}}
                      @endforeach
                    </td>
                    <td>{{$order->status == 'APPROVED' ? 'Pago' : 'Pago pendiente'}}</td>
          				  <td>${{number_format($order->price)}}</td>
          				  <td>
                      @if($order->status == 'APPROVED')
                        <i class="fa fa-check-circle-o fa-3x" style="color: #74FA6E;"></i>
                      @else
                        <a href="{{route('history.reOrder',$order->id)}}" style="color:#ef233c; cursor: pointer;">Reordenar&nbsp;<i class="fa fa-arrow-circle-right"></i></a>
                      @endif
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

  </div>
</div>

@endsection
