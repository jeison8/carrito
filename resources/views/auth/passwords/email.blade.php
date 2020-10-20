@extends('layout.layout')

@section('content')

<div class="section">
    <div class="container">
        <div class="col-md-12">
            <div class="card">
                <h4>RECUPERAR CONTRASEÑA</h4>
                <br>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-5">
                                <h4 class="product-name">Correo *</h4>
                                <input id="email" type="email" class="input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6" style="margin-top: 24px;">
                                <button type="submit" class="cart-bottom">
                                    Recuperar
                                </button>
                            </div>
                        </div>  
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
