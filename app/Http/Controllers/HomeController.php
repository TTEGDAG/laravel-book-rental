<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //return Category::find(1)->books;
        
        $books = Book::with('category')->get();
        //$books = Book::whereBelongsTo( 1, 'categories_id')->get();
        //$books = Book::where('categories_id', 1)->get();
        //dd($books);
        return view('home', compact('books'));
    }
}
