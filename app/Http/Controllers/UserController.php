<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

// //use Auth class to get login user information
// use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //Display all users
    public function index() {
        $users = User::get();
        //compact => create array using variable name
        return view('users.index', compact('users'));
    }
    
    //Display user profile
    public function profile() {
        
    }
    
    //Display user's info edit page
    public function edit(Request $request) {
        
    }
    
}
