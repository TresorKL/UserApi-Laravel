<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AppUser;

class UserController extends Controller
{
    //
    function getUsers(){
        return appUser::all();
    }
    //
    function getUser($id){
        return appUser::find($id);
    }

    function addUser(Request $request){
        $appUser = new AppUser;

        $appUser->userName=$request->userName;
        $appUser->body=$request->body;
        $newUser= $appUser->save();

        if($newUser){
            return ["Result"=>"user has been saved"];
        }else{
            return ["Result"=>"something went wrong"];  
        }

    }

    function updateUser(Request $request){

        $user = AppUser::find($request->id);

        $user->userName=$request->userName;
        $user->body=$request->body;
        $result=$user->save();

        if($request){
            return ["result"=>"user details updated"];
        }else{
            return ["result"=>"something went wront"];
        }

    }
}
