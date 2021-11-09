@extends('layouts.app')

@section('content')

<script src="{{asset('js/product_validator.js')}}" defer></script>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add New Product to {{$user->name}}</div>
                <div class="card-body">
                    <!-- Form to add a Product -->
                    <form id ="product_form" method ="post" action="" enctype="multipart/form-data">
                        <input type="hidden" id ="token" name="_token" value="{{csrf_token()}}">
                        Name
                        <input id="name" type="text" class="form-control" name="name" onchange="validate_input()"><br>
                        
                        <br>
                        <!-- Placeholder for the button after everything is checked -->
                        <div id="form_end"></div>
                    </form>
                    <button id="add_product_btn" class="btn btn-primary">Add Product</button>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection