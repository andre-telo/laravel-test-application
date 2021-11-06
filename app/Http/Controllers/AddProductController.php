<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Auth;

class AddProductController extends Controller
{
    //Returns the view to add a horse
    public function index(){
        $current_user = Auth::user();
        //Verifies that the user is an admin
        if($current_user && $current_user->role  == "admin"){
            //Search for the last 10 horses added
            /*$horses = Horse::orderByDesc('created_at')->take(10)->get();*/
            return view('add_product');
        }else{
            //In case the user isn't an admin, redirect to login page
            return redirect('/login');
        }
    }

}