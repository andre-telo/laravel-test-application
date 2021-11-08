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

    /*public function add(Request $request){
        $current_user = Auth::user();
        //Verifies that the user is an admin
        if($current_user && $current_user->role  == "admin"){
            //Create new jockey with the parameters from the request
            $jockey = new Jockey;
            $jockey->name = $request->name;
            $jockey->birth_date = $request->birth_date;
            $jockey->gender = $request->gender;
            $jockey->num_races = $request->num_races;
            $jockey->num_victories = $request->num_victories;
            
            //Photo file path treatment so it can be saved without problems
            $photo = $request->file('jockey_photo');
            //saves photo will name-orginial photo name
            $fileName = $request->name . '-' .$photo->getClientOriginalName();
            //path to folder to save 
            $path = 'img/jockey_photo/';
            //saves photo in that folder
            $file = $photo->move($path, $fileName);

            //apends all filepath to photo img/jokey-photo...
            $file_path = $path . $fileName;
            //adds the file path to the parameter
            $jockey->file_path = '/' . $file_path;
            $jockey->save();

            //fetches the id of the new jockey, adds to the photo name and updates the file_path atribute
            $id = $jockey->id;
            //creates a new file path but appends the id in the photo name
            $new_file_path = $path . $id . '-' . $fileName;
            
            // renames the photo
            rename($file_path, $new_file_path);
            //updates the file_path
            $jockey->file_path = '/' . $new_file_path;
            $jockey->save();

            return redirect('/add_jockeys');
        }else{
            //In case the user isn't an admin, redirect to login page
            return redirect('/login');
        }       
    }*/
    

}