<?php

namespace App\Http\Controllers;

use App\Orders;
use Illuminate\Http\Request;
use App\Author;
use App\Book;
use App\Gender;
use Illuminate\Support\Facades\Auth;
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

        $user = Auth::user();

        $orders = Orders::select('book_id')
            ->where('users_id', $user->id)
            ->where('status_id', '<>', 5)
            ->pluck('book_id')->toArray();

        $books = Book::select('books.*')
            ->join('inventories', 'books.id', 'inventories.book_id')
            ->where('inventories.status_id', 1)
            ->whereNotIn('books.id', $orders)
            ->distinct()
            ->get();



//        $books = Book::select('books.*')
//            ->join('inventories', 'books.id', 'inventories.book_id')
//            ->leftJoin('orders', function ($join) use ($user) {
//                $join->on('orders.book_id', 'books.id')
//                    ->where('orders.users_id', $user->id);
//            })
//            //->join('book_status', 'inventories.status_id', '=', 'book_status.id')
//            ->whereNull('orders.id')
//            ->distinct()
//            ->with(['gender', 'author'])
//            ->get();



        return view('orders.bookrequest', ['books'=>$books,'genders' => $genders, 'authors' => $authors]);
    }
}
