<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\User;
use App\Models\Product;

class ViewProductsOnSellController extends Controller
{
    //Returns the view with all the database management options for the admin
    public function index(){
        $current_user = Auth::user();
        //Verifies that the user is an admin
        $products = Product::where('products.status','=','on_sell')->get();

        if($current_user){
            return view('ViewProductsOnSell', compact('current_user', 'products'));
        }else{
            //In case the user isn't an admin, redirect to login page
            return redirect('login');
        }
    }
}