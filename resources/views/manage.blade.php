@extends('layouts.app')

<link rel="stylesheet" href="https://unpkg.com/tachyons@4.10.0/css/tachyons.min.css"/>

@section('content')
<div class="mw6 center pa3 sans-serif">

    <h1 class="mb4">Users</h1>



    @foreach($users as $user)

    <div class="pa2 mb3 striped--near-white">

        <header class="b mb2">{{ $user->name }}</header>

        <div class="pl2">

            <p class="mb2">id: {{ $user->id }}</p>

            <p class="mb2">email: {{ $user->email }}</p>
            <div class="choice">
                <a href="/add_product={{$user->id}}">
                    <h3>Add Product</h3>
                </a>
                <a href="/view_products={{$user->id}}">
                    <h3>View Products</h3>
                </a>
            </div>

        </div>

    </div>

    @endforeach

</div>


@endsection


<!--
<h1>Options</h1> -->

<!-- DataBase manage options for the admin  --> 
<!--
<div class="center">
    <div class="choice">
        <a href="{{ url('/add_product') }}"><h3>Add Product</h3></a>
    </div>
</div> -->