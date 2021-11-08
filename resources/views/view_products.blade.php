@extends('layouts.app')
<link rel="stylesheet" href="https://unpkg.com/tachyons@4.10.0/css/tachyons.min.css"/>

@section('content')
<div class="mw6 center pa3 sans-serif">

    <h1 class="mb4">{{ $user->name }}</h1>

    
    <div class="pa2 mb3 striped--near-white">

        <header class="b mb2">Products:</header>

        <div class="pl2">

        @if(count($products) < 1)
            <div class="alert alert-warning">
                <strong>No Product Found!</strong>
            </div>                                      
        @else
        

            @foreach($products as $product)
                
                <p class="mb2">{{ $product->name }}</p>

            @endforeach

        @endif

        </div>

    </div>
    
</div>

@endsection