@extends('layouts.app')


@section('content')
   


        <h1> Put Product: {{ $products[0]->name}}  on Sell</h1>

        <form id ="putonsell_product_form" method ="post" action="" enctype="multipart/form-data">
            <input type="hidden" id ="token" name="_token" value="{{csrf_token()}}">
            <input id="price" type="number" step="0.01" class="form-control" name="price"><br>
        

            <button id='putonsell_product_btn' type="submit" class="btn btn-primary">Put Product on Sell </button>
        </form>
    

@endsection