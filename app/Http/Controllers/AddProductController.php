<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Auth;
use App\Models\User;
use App\Models\Product;

class AddProductController extends Controller
{
    //Returns the view to add a product
    public function index($id){
        $current_user = Auth::user();
        //Verifies that the user is an admin
        if($current_user && $current_user->role  == "admin"){
            $user = User::find($id);
            
            //verify if user exists
            if($user){
                return view('add_product', compact('user'));
            
            }else{
                //In case the user doesn't exist, redirect to users list page
                return redirect('/manage');
            }

        }else{
            //In case the user isn't an admin, redirect to login page
            return redirect('/login');
        }
    }

    //add Product ---------------------NOT FINISHED
    public function addProduct(Request $request, $id){
        $current_user = Auth::user();
        if($current_user && $current_user->role  == "admin"){
            $user = User::find($id);
            //Verifies that the user exists
            if($user){
                $product = new Product;
                //Update user
                $product->name = $request->name;
                $product->user_id = $id;
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