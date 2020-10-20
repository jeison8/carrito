@extends('layout.layout') 

@section('content')   

<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title">
                    <div class="table-responsive">
                        <table class="table">
                            <thead id="thead">
         
                            </thead>
                            <tbody id="table_id">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-6" id="logosend">
                    
            </div>
            <div class="col-md-6" id="tablesend">
            
            </div>
        </div>
    </div>
</div>

@endsection

@push('custom-scripts')
    <script src="{{asset('js/functionsCart.js')}}"></script>
@endpush



