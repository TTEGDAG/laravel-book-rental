<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class BookController extends Controller
{    
    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::with('category')->paginate(5);
        $user = DB::select('select * from users where id = ?', [Auth::user()->id]);
        return view('books.backend.index', compact('books', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();

        return view('books.backend.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'photo' =>  'image|mimes:jpeg,jpg,gif',
            'file'  =>  'file|mimes:pdf',

        ]);

        $input = $request->all();
        //dd($input);
        if($request->hasFile('photo'))
        {
            $file = $request->file('photo');
            $photoname = time() . '.' .$file->getClientOriginalExtension();

            Image::make($file)->fit(480, 640)->save('photo/' .$photoname, 100);

        }

        if($request->hasFile('file'))
        {
            $file = $request->file('file');
            $filename = uniqid() . '.' .$file->getClientOriginalExtension();

            $file->move('pdf', $filename);
        }

        $book = new Book();
        $book->title = $request->title;
        $book->author = $request->author;
        $book->desctiption = $request->description;
        $book->title = $request->author;
        $book->category_id = $request->category_id;
        $book->pages = $request->pages;
        $book->date = $request->date;
        $book->photo = $photoname;
        $book->file = $filename;

        $book->save();

        return redirect('/books/all')
        ->with([
            'status'    =>  [
                'type'  =>  'success',
                'content'=> 'Książka została dodana',
            ]
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::findOrFail($id);

        return view('books.backend.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}