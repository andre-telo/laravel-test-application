@extends('layouts.app')

@section('content')

<div class="mw6 center pa3 sans-serif">
    <h1> Purchasers For {{$product->name}} </h1>
   
    <div class="pa2 mb3 striped--near-white">

        <div class="pl2">

        @if(count($purchasers) < 1)
            <div class="alert alert-warning">
                <strong>No Purchasers Found!</strong>
            </div>                                      
        @else

        @foreach($purchasers as $purchaser)
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header"> <h2>{{ $purchaser->name }}</h2></div>
                                <div class="card-body">
                                    
                                    
                                    <form id ="sell_product_form" method ="post" action="" enctype="multipart/form-data">
                                        <input type="hidden" id ="token" name="_token" value="{{csrf_token()}}">

                                        <button id='sell_product_btn' type="submit" class="btn btn-primary">Sell Product to this Purchaser</button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        @endforeach
    

    @endif


@endsection