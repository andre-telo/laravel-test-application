<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Auth;
use App\Models\User;
use App\Models\Product;

class PutProductsOnSellController extends Controller
{
    //Returns the view to add a product
    public function index($id){
        $current_user = Auth::user();
        //Verifies the user
        $products = Product::where('products.id','=',$id)->get();
        $product_user = Product::Select('user_id')->where('products.id','=',$id)->get();

        

        if($current_user->id == $product_user[0]->user_id){
            //$user = User::find($product->'user_id');
            
            //verify if user exists
            if($products){
                return view('PutProductsOnSell', compact('product_user', 'products'));
            
            }else{
                //In case the user doesn't exist, redirect to main page
                return redirect('/');
            }

        }else{
            //In case the user isn't an admin, redirect to login page
           return redirect('/login');
        }
    }

    public function putonsale(Request $request, $id){
        $current_user = Auth::user();
        if($current_user){
            $product = Product::find($id);
            //Verifies that the user exists
            if($product){
                //Update user
                $product->price = $request->price;
                $product->status = "on_sell";
                $product->save();

                return redirect('/manage');
            }else{
                //In case the user doesn't exist, redirect to users list page
                return redirect('/manage');
            }
        }else{
            //In case the user isn't an admin, redirect to login page
            return redirect('/login');
        } 
    }

}