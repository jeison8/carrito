@extends('layout.layout') 

@section('content')   

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<div class="col-md-7">

					 	@include('auth.loginForm')  

					</div>

					<!-- Order Details -->
						@include('detailOrder')
					<!-- /Order Details -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->


@endsection
@push('custom-scripts')
    <script src="{{asset('js/order.js')}}"></script>
@endpush
