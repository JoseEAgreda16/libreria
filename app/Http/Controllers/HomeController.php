<?php

namespace App\Http\Controllers;

use App\Orders;
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
        $orders = Orders::with(['user','inventory', 'status'])
            ->get();
        return view('orders.index')->with(['orders' => $orders]) ;
    }

    public function users()
    {

        $genders = Gender::all();
        $authors = Author::all();

        $books = Book::select('books.*')
            ->leftJoin('orders', 'books.id', 'orders.book_id')
            //->join('book_status', 'inventories.status_id', '=', 'book_status.id')
            ->whereNull('orders.id')
            ->distinct()
            ->with(['gender', 'author'])
            ->get();



        return view('orders.bookrequest', ['books'=>$books,'genders' => $genders, 'authors' => $authors]);
    }
}
