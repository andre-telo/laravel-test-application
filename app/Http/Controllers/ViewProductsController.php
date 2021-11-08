<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\User;
use App\Models\Product;

class ViewProductsController extends Controller
{
    //Returns the view with all Products of user for the admin
    public function index($id){
        $current_user = Auth::user();
        //Verifies that the user is an admin
        if($current_user->id == $id || $current_user->role  == "admin"){
            $user = User::find($id);
            
            $products = Product::where('products.user_id','=',$id)->get();
            
            //verify if user exists
            if($user){
                //precisa de enviar os produtos deste user
                return view('view_products', compact('user', 'products'));
            
            }else{
                //In case the user doesn't exist, redirect to users list page
                return redirect('/');
            }

        }else{
            //In case the user isn't an admin, redirect to login page
            return redirect('/login');
        }
    }
}