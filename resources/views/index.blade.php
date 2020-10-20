@extends('layout.layout')

@section('content')

<div class="section">
    <div class="container">
        <div class="row">

            @if(Session::has('messageApproved'))
                <div class="alert alert-success alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  {{Session::get('messageApproved')}}
                </div>
                <script>  localStorage.clear();  </script>
            @endif

            @if(Session::has('messageRejected'))
                <div class="alert alert-danger alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  {{Session::get('messageRejected')}}
                </div>
            @endif

            @if(isset($products))
                <div class="col-md-12">
                    <div class="section-title">
                        <h3 class="title">Productos</h3>
                        <hr>
                    </div>
                </div>

                <!-- Products tab & slick -->
                <div class="col-md-12">
                    <div class="row">
                        <div class="products-tabs">
                            <div id="tab1" class="tab-pane active">
                                <div class="products-slick" data-nav="#slick-nav-1">
                                <!-- product -->
                                @foreach($products as $product)
                                    <div class="product">
                                        <div class="product-img">
                                            <img src="{{asset($product->img)}}" alt="">
                                        </div>
                                        <div class="product-body">
                                            <p class="product-category">{{$product->category->name}}</p>
                                            <h3 class="product-name">
                                                <a href="#">{{$product->name}}</a>
                                            </h3>
                                            <h4 class="product-price">${{number_format($product->price)}}</h4>
                                            <del class="product-old-price">${{number_format($product->price + 100000) }}</del>
                                            <div class="product-btns">
                                                <button class="quick-view"><a href="{{route('store.detail',$product->id)}}"><i class="fa fa-eye"></i><span class="tooltipp">ver</span></a></button>
                                            </div>
                                        </div>
                                        <div class="add-to-cart">
                                            <button class="add-to-cart-btn" onclick="addCart({{$product->id}})"><i class="fa fa-shopping-cart"></i> agregar</button>
                                        </div>
                                    </div>
                                @endforeach
                                <!-- /product -->
                                </div>
                                <div id="slick-nav-1" class="products-slick-nav"></div>
                            </div>
                        </div>
                    </div>
            @else

                <div class="col-md-12">
                    <div class="section-title">
                        <h3 class="title">Laptops</h3>
                        <hr>
                    </div>
                </div>

                <!-- Products tab & slick -->
                <div class="col-md-12">
                    <div class="row">
                        <div class="products-tabs">
                            <div id="tab1" class="tab-pane active">
                                <div class="products-slick" data-nav="#slick-nav-1">
                                <!-- product -->
                                @foreach($laptops as $laptop)
                                    <div class="product">
                                        <div class="product-img">
                                            <img src="{{asset($laptop->img)}}" alt="">
                                        </div>
                                        <div class="product-body">
                                            <p class="product-category">{{$laptop->category->name}}</p>
                                            <h3 class="product-name">
                                                <a href="#">{{$laptop->name}}</a>
                                            </h3>
                                            <h4 class="product-price">${{number_format($laptop->price)}}</h4>
                                            <del class="product-old-price">${{number_format($laptop->price + 100000) }}</del>
                                            <div class="product-btns">
                                                <button class="quick-view"><a href="{{route('store.detail',$laptop->id)}}"><i class="fa fa-eye"></i><span class="tooltipp">ver</span></a></button>
                                            </div>
                                        </div>
                                        <div class="add-to-cart">
                                            <button class="add-to-cart-btn" onclick="addCart({{$laptop->id}})"><i class="fa fa-shopping-cart"></i> agregar</button>
                                        </div>
                                    </div>
                                @endforeach
                                <!-- /product -->
                                </div>
                                <div id="slick-nav-1" class="products-slick-nav"></div>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-12">
                        <div class="section-title">
                            <h3 class="title">Accesorios</h3>
                            <hr>
                        </div>
                    </div>

                    <!-- Products tab & slick -->
                    <div class="col-md-12">
                        <div class="row">
                            <div class="products-tabs">
                                <div id="tab1" class="tab-pane active">
                                    <div class="products-slick" data-nav="#slick-nav-1">
                                        @foreach($accessories as $accessory)
                                        <div class="product">
                                            <div class="product-img">
                                                <img src="{{asset($accessory->img)}}" alt="">
                                            </div>
                                            <div class="product-body">
                                                <p class="product-category">{{$accessory->category->name}}</p>
                                                <h3 class="product-name">
                                                    <a href="#">{{$accessory->name}}</a>
                                                </h3>
                                                <h4 class="product-price">${{number_format($accessory->price)}}</h4>
                                                <del class="product-old-price">${{number_format($accessory->price + 100000) }}</del>
                                                <div class="product-btns">
                                                    <button class="quick-view"><a href="{{route('store.detail',$accessory->id)}}"><i class="fa fa-eye"></i><span class="tooltipp">ver</span></a></button>
                                                </div>
                                            </div>
                                            <div class="add-to-cart">
                                                <button class="add-to-cart-btn" onclick="addCart({{$accessory->id}})"><i class="fa fa-shopping-cart"></i> agregar</button>
                                            </div>
                                        </div>
                                        @endforeach
                                    <!-- /product -->
                                    </div>
                                <div id="slick-nav-1" class="products-slick-nav"></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="section-title">
                            <h3 class="title">Celulares</h3>
                            <hr>
                        </div>
                    </div>

                    <!-- Products tab & slick -->
                    <div class="col-md-12">
                        <div class="row">
                            <div class="products-tabs">
                                <div id="tab1" class="tab-pane active">
                                    <div class="products-slick" data-nav="#slick-nav-1">
                                        @foreach($cellPhones as $cellPhone)
                                        <div class="product">
                                            <div class="product-img">
                                                <img src="{{asset($cellPhone->img)}}" alt="">
                                            </div>
                                            <div class="product-body">
                                                <p class="product-category">{{$cellPhone->category->name}}</p>
                                                <h3 class="product-name">
                                                    <a href="#">{{$cellPhone->name}}</a>
                                                </h3>
                                                <h4 class="product-price">${{number_format($cellPhone->price)}}</h4>
                                                <del class="product-old-price">${{number_format($cellPhone->price + 100000) }}</del>
                                                <div class="product-btns">
                                                    <button class="quick-view"><a href="{{route('store.detail',$cellPhone->id)}}"><i class="fa fa-eye"></i><span class="tooltipp">ver</span></a></button>
                                                </div>
                                            </div>
                                            <div class="add-to-cart">
                                                <button class="add-to-cart-btn" onclick="addCart({{$cellPhone->id}})"><i class="fa fa-shopping-cart"></i> agregar</button>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    </div>
                                <div id="slick-nav-1" class="products-slick-nav"></div>
                            </div>
                        </div>
                    </div>
            @endif
            </div>
        </div>
    </div>
</div>

@if(isset($accesories))
    @include('layout.promotion',compact('accessories'))
@endif


{{--
        <!-- NEWSLETTER -->
        <div id="newsletter" class="section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="newsletter">
                            <p>Sign Up for the <strong>NEWSLETTER</strong></p>
                            <form>
                                <input class="input" type="email" placeholder="Enter Your Email">
                                <button class="newsletter-btn"><i class="fa fa-envelope"></i> Subscribe</button>
                            </form>
                            <ul class="newsletter-follow">
                                <li>
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <!-- /NEWSLETTER -->

@endsection
