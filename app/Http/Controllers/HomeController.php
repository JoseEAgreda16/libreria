<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Author;
use App\Book;
use App\Gender;

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
        return view('orders.bookrequest', ['genders' => $genders, 'authors' => $authors]);
    }
}
