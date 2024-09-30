<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Faker\Calculator\Isbn;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(){

        // $books = Book::all();
        // $books = Book::find(1);
        // $books = Book::take(10)->get();
        // $books = Book::where('price','<',150)->get();
        // $books = Book::whereBetween('price',[10,100])->get();

        // with paginate
        $books = Book::paginate(10);

        // with eager loading
        // $books = Book::with('author')->get();

        // raw query
        // $books = DB::table('books')->where('price','<',150)->get();

        // subquery
        // $books = Book::where('price','<',DB::table('books')->avg('price'))->get();

        // complex query
        // $books = Book::where('price','<',150)
        // ->where('stock','>',10)
        // ->orderBy('title','asc')
        // ->get();

        // complex query with joins
        // $books = Book::join('authors','books.author_id','=','authors.id')
        // ->select('books.*','authors.name as author_name')
        // ->where('books.price','<',150)
        // ->where('books.stock','>',1


        // $books = Book::whereBetween('price',[10,100])
        // ->where('stock','>',10)
        // ->orderBy('title','asc')
        // ->toSql();

        // return $books;

        return view('books.index')->with('books', $books);

    }

    public function show($id){
        // return 'showing book Id'.' '.$id;

        $book = Book::find($id);
        return view('books.show')->with('book',$book);
    }
    public function create(){
        return view('books.create');

    }
    public function store(Request $request){
        $rules = [
            'title' =>'required',
            'author' =>'required',
            'isbn' =>'required | size:13',
            'price' =>'required|numeric|integer',
            'stock' =>'required|numeric|gte:0',
        ];
        $message =[
                'stock.gte' => 'The stock must be greater than or equal to zero',
        ];

        $request->validate($rules,$message);
        
        // way 1. insert data into database
        // Book::create($request->all());
        // return redirect()->route('books.index');

        // or way 2. insert data into database : if field name is not same to databs table

        // $book = new Book();
        // $book->title = $request->title;
        // $book->author = $request->author;
        // $book->isbn = $request->isbn;
        // $book->price = $request->price;
        // $book->stock = $request->stock;
        // $book->save();
       
        //  way 3. 
        // $data = [
        //     'title'=> $request->title,
        //     'author'=> $request->author,
        //     'Isbn'=>$request->isbn,
        //     'price'=> $request->price,
        //    'stock'=> $request->stock
        // ];
        // $boook = Book::create($data);


        // alse to see the newly inserted records
        $book = Book::create($request->all());
        return redirect()->route('books.show', $book->id);
    }

    public function destroy(Request $request,$id){
        $book = Book::find($id);
        $book->delete();
        return redirect()->route('books.index');
    }
 }