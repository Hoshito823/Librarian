<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class BookController extends Controller
{
    //Display all boooks
    public function index() {
        $books = Book::get();
        return view ('boox.index', compact('books'));
    }
    
    //Disaplay books detail
    public function detail(Request $request) {
        
    }
    
}
