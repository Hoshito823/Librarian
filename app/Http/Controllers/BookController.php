<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\User;
use App\Book;
use App\Tag;
use App\Book_tag;

class BookController extends Controller
{
    // ▼ Display all boooks & Search function
    public function index(Request $request) {
        $searchText = $request->searchText;
        
        if ($searchText != '') {
            //when you search some book name, display result of books search.
            $query = Book::query();
            $books = $query->where('name', 'like', '%'.$searchText.'%')->get();
            return view ('books.index', compact('books', 'searchText'));
        } else {
            //display all books
            $books = Book::all();
            return view ('books.index', compact('books'));
        }
        
        
        
    }
    
    // ▼ Disaplay books detail
    public function detail(Request $request) {
        
    }
    
    // ▼ Display book register page
    public function registerPage() {
        $tags = Tag::all();
        return view('books.register', compact('tags'));
    }
    
    // ▼ Register books detail
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
    
        //put user_id to book model
        $book->user_id = $owner->id;
        
        //tagが入ったtags配列を取得し、一つずつbook_tagsテーブルに入れていく
        $tagIdArray = $form['tags'];
        
        unset($form['tags']);
        
        //put request data to book model
        $book->fill($form);        
        $book->save();

        foreach ($tagIdArray as $tag) {
            $book_tag = new Book_tag;
            $book_tag->book_id = $book->id;
            $book_tag->tag_id = (int)$tag;
            $book_tag->save();
        }
        
        return redirect('/');
    }
    
    // ▼ Return top page
    public function back() {
       return redirect('/');
    }
    
}
