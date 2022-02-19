<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
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
        $this->middleware('auth');
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
        $categories = Category::withCount('books')->orderBy('name', 'asc')->get();

        return view('books.frontend.category', compact('books', 'similarbook', 'categories'));
    }

    public function show($id)
    {
        $book = Book::findOrFail($id);
        //dd($book->description);
        $categories = Category::withCount('books')->orderBy('name', 'asc')->get();          

        return view('books.frontend.show', compact('book', 'categories'));
        //return view('books\fronted\show');
    }

    public function name(Request $request)
    {
        $input = $request->name;
        $books = Book::where('title', 'like', '%'.$input.'%')->paginate(5);
        $categories = Category::withCount('books')->orderBy('name', 'asc')->get();
         
        return view('books.frontend.search', compact('books', 'categories'));
    }

    public function rent(Request $request)
    {
        $input =  $request->all();
        //dd($input);

        $books = DB::select('select * from book_user where user_id = ?', [Auth::user()->id]);

        /**jeżeli nie ma książki w bazie danych to ją wypożycz */
        if( $books == NULL )
        {
            $new = new Book();

            DB::table('book_user')->insert([
                'user_id'   =>  $request->user_id,
                'book_id'   =>  $request->book_id,
                'date_rent'  =>  $request->date_rent
            ]);
        } else{
            /**jeżeli w bazie danych jest książka przypisana do danego użytkownika to info */
            foreach( $books as $book)
            {
                echo $book->book_id;
            }

            if( ( $book->book_id == $request->book_id) == TRUE )
            {
                return redirect()->route('home')
                ->with([
                    'status'    =>  [
                        'type'  =>  'danger',
                        'content'=> 'Próbujesz wypożyczyć książkę którą już wypożyczyłeś'
                    ]
                ]);
            }

            $new = new Book();

            $new->book_id = $request->book_id;
            
            DB::table('book_user')->insert([
                'user_id'   =>  $request->user_id,
                'book_id'   =>  $request->book_id,
                'date_rent'  =>  $request->date_rent,
                'created_at'    => DB::raw('CURRENT_TIMESTAMP'),
                'updated_at'    => DB::raw('CURRENT_TIMESTAMP')
            ]);
        }

        return redirect()->route('account.user.books', ['id' => Auth::user()->id ])
        ->with([
            'status'    =>  [
                'type'  =>  'success',
                'content'   =>  'Książka została wypożyczona do dnia '. date('d-m-yy', $request->date_rent)
            ]
        ]);
    }
}
