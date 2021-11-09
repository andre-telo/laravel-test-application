<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Auth;
use App\Models\User;
use App\Models\Product;
use App\Models\Purchaser;

class purchase_productController extends Controller
{
    //Returns the view to purchase a product
    public function index($id){
        $current_user = Auth::user();
        //Verifies that the user is an admin
        if($current_user){
            $product = Product::find($id);
            
            //verify if user exists
            if($product){
                return view('purchase_product', compact('current_user','product'));
            
            }else{
                //In case the user doesn't exist, redirect to users list page
                return redirect('/view_products_on_sell');
            }

        }else{
            //In case the user isn't an admin, redirect to login page
            return redirect('/login');
        }
    }

    //add Product 
    public function purchaseProduct(Request $request, $id){
        $current_user = Auth::user();
        if($current_user){
            //$user = User::find($id);
            $product = Product::find($id);
            //Verifies that the user exists
            if($product){
                
                //Create purchaser
                $purchaser = new Purchaser;
                
                $purchaser->name = $current_user->name;
                $purchaser->product_id = $id;
                $purchaser->purchaser_id = $current_user->id;

                $purchaser->save();
                /*Update product
                $product->price = null;
                $product->status = null;
                $product->user_id = $current_user->id;
                $product->save();
                */
                return redirect('/');
            }else{
                //In case the user doesn't exist, redirect to users list page
                return redirect('/view_products_on_sell');
            }
        }else{
            //In case the user isn't an admin, redirect to login page
            return redirect('/login');
        } 
    }


}