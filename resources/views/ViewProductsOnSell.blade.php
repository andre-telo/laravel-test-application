@extends('layouts.app')
<link rel="stylesheet" href="https://unpkg.com/tachyons@4.10.0/css/tachyons.min.css"/>

@section('content')
<div class="mw6 center pa3 sans-serif">
    <h1> Products To Purchase</h1>
   
    <div class="pa2 mb3 striped--near-white">

        <div class="pl2">

        @if(count($products) < 1)
            <div class="alert alert-warning">
                <strong>No Product Found!</strong>
            </div>                                      
        @else
        

            @foreach($products as $product)
                
                            
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header"> <h2>{{ $product->name }}</h2></div>
                                    <div class="card-body">
                                        Status: {{ $product->status }} <br>
                                        Price: {{ $product->price }}
                                        <a href="/purchase_product={{$product->id}}">
                                            <h5>Purchase</h5>
                                        </a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @endforeach

            @endif

            </div>

    </div>
    
</div>

@endsection