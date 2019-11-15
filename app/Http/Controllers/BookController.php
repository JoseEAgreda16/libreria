<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{

    public function index()
    {
        $books = Book::all();

        return response()->json([
            "data" => $books->toArray()
        ]);
    }


    public function AddBooksView()
    {
        return view('bookregist');
    }

    public function  AddBooks(Request $request)
    {
        $newuser = new Book($request->all());
        $newuser->save();
    }


    public function UpdateBooks(Request $request, $title)
    {
        Book::findOrFail($title)->update($request->all());
    }

    public function DeleteBooks($title, $id_author)
    {
       Book::findOrFail($title, $id_author)->delete();
    }
}
