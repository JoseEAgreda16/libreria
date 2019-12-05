<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Author;
use App\Book;
use App\Gender;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $this->middleware('guest');
        return view('index');
    }

    public function home()
    {
        $genders = Gender::all();
        $authors = Author::all();
        return view('orders.index', ['genders' => $genders, 'authors' => $authors]);
    }

    public function users()
    {

        $genders = Gender::all();
        $authors = Author::all();

        $books = Book::select('books.*')
            ->join('inventories', 'books.id', '=', 'inventories.book_id')
            //->join('book_status', 'inventories.status_id', '=', 'book_status.id')
            ->where('inventories.status_id', '=', 1)
            ->distinct()
            ->with(['gender', 'author'])
            ->get();



        return view('orders.bookrequest', ['books'=>$books,'genders' => $genders, 'authors' => $authors]);
    }
}
