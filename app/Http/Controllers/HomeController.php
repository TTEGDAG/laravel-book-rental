<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;

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
        
        $books = Book::with('category')->orderBy('created_at', 'desc')->paginate(10);
        $categories = Category::withCount('books')->orderBy('name', 'asc')->get();          
        return view('home', compact('books', 'categories'));
    }

    public function category($id)
    {
        $books = Book::with('category')->where('category_id', $id)->paginate(10);
        $similarbook = Book::with('category')->inRandomOrder()->paginate(5);
        $categories = Category::withCount('books')->get();

        return view('books.frontend.category', compact('books', 'similarbook', 'categories'));
    }

    public function show($id)
    {
        $book = Book::findOrFail($id);
        //dd($book->desctiption);
        $categories = Category::withCount('books')->orderBy('name', 'asc')->get();          

        return view('books.frontend.show', compact('book', 'categories'));
        //return view('books\fronted\show');
    }

    public function name(Request $request)
    {
        $input = $request->name;
        $books = Book::where('title', 'like', '%'.$input.'%')->paginate(5);
        $categories = Category::withCount('books')->get();
         
        return view('books.frontend.search', compact('books', 'categories'));
    }
}
