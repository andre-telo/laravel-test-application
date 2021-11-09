<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\User;
use App\Models\Product;
use App\Models\Purchaser;

class View_Product_PurchasersController extends Controller
{
    //Returns the view with all the database management options for the admin
    public function index($id){
        $current_user = Auth::user();
        //Verifies that the user is an admin
        $purchasers = Purchaser::where('purchasers.product_id','=',$id)->get();
        $product = Product::find($id);

        if($current_user){
            return view('ViewProductPurchasers', compact('current_user', 'purchasers', 'product'));
        }else{
            //In case the user isn't an admin, redirect to login page
            return redirect('login');
        }
    }

    public function sell(Request $request, $id){
        $current_user = Auth::user();
        if($current_user){
            //$user = User::find($id);
            $product = Product::find($id);
            $purchasers = Purchaser::where('purchasers.product_id','=',$id)->get();
            //Verifies that the user exists
            if($product){
                
                /*Do Update to product*/
                $product->price = null;
                $product->status = null;
                $product->user_id = $purchasers[0]->purchaser_id;
                $product->save();

                $purchasers[0]->delete();
                
                return redirect('/');
            }else{
                //Products
                return redirect('/');
            }
        }else{
            //In case the user isn't an admin, redirect to login page
            return redirect('/login');
        } 
    }

}