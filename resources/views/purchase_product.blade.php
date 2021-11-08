@extends('layouts.app')


@section('content')
   


        <!--
        <h1> Purchase Product: {{ $product->name}} </h1>

        <h3>Status: {{ $product->status }} </h3> <br>
        <h3>Price: {{ $product->price }} </h3> <br>

        -->

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header"> <h2>{{ $product->name }}</h2></div>
                            <div class="card-body">
                                Status: {{ $product->status }} <br>
                                Price: {{ $product->price }}
                                
                                <form id ="purchase_product_form" method ="post" action="" enctype="multipart/form-data">
                                    <input type="hidden" id ="token" name="_token" value="{{csrf_token()}}">

                                    <button id='purchase_product_btn' type="submit" class="btn btn-primary">Purchase Product </button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    

@endsection