<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\User;
use App\Book;

class BookController extends Controller
{
    //Display all boooks
    public function index() {
        $books = Book::all();
        return view ('books.index', compact('books'));
    }
    
    //Disaplay books detail
    public function detail(Request $request) {
        
    }
    
    //display book register page
    public function registerPage() {
        return view('books.register');
    }
    
    //register books detail
    public function register(Request $request) {
        $this->validate($request, Book::$rules);
        
        $book = new Book;
        $owner = Auth::user();
        $form = $request->all();
        
        if (isset($form['image'])) {
            $path = $request->file('image')->store('public/image');
            $book->image_path = basename($path);
        } else {
            $book->image_path = null;
        }
        
        unset($form['_token']);
        unset($form['image']);
        
        //put request data to book model
        $book->fill($form);
        //put user_id to book model
        
        $book->user_id = $owner->id;
        
        $book->save();
    
        return redirect('/');
    }
    
}
