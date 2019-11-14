<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{

    public function index()
    {
        $books = Book::all();

        return view('listBook')->with([
            'title' => $books,
            'author_id' => $books,
            'date_public' => $books,
            'genres_id' => $books,
            'quantity' => $books

        ]);
    }


    public function  AddBooks(Request $request)
    {
        $newuser = new Book($request->all());
        $newuser->save();
    }

    public function AddBooksView()
    {
        return view('bookregist');
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
