@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"> <h2>Put Product: {{ $products[0]->name}}  on Sell</h2></div>
                        <div class="card-body">

                            <form id ="putonsell_product_form" method ="post" action="" enctype="multipart/form-data">
                                <input type="hidden" id ="token" name="_token" value="{{csrf_token()}}">
                                Price: 
                                <input id="price" type="number" step="0.01" size="4" class="form-control" style="width: 8rem;" name="price"> <br>
                            

                                <button id='putonsell_product_btn' type="submit" class="btn btn-primary">Put Product on Sell </button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    

@endsection