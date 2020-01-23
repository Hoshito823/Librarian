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
            $books = $query->where('name', 'like', '%'.$searchText.'%')->paginate(7);
            return view ('books.index', compact('books', 'searchText'));
        } else {
            //display all books
            $books = Book::paginate(7);
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
    
    // ▼ Register book
    public function registerBook(Request $request) {
        
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
        
        //save book status(Dedfault Status = Available)
        $book->status = 1;
        
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
        
        session()->flash('successMessage', 'Registered Successfuly');
        return redirect('/');
    }
    
    // ▼ Borrow Book
    public function borrow(Request $request) {
        $book = Book::find($request->id);
        $borrower = Auth::user();
        
        //Change availability status 1(available) → 0(to be available).
        $book->status = 0;
        
        //Register borrower's user_id
        $book->lend_user_id = $borrower->id;
        
        $book->save();
        
        session()->flash('successMessage', "Your request is accepted ! Let's contact to book's owner.");
        return redirect('/');
    }
    
    // ▼ Return top page
    public function back() {
       return redirect('/');
    }
    
}
