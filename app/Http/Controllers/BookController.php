<?php

namespace App\Http\Controllers;

use App\Author;
use App\Book;
use App\Gender;
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
        $genders = Gender::all();
        $authors = Author::all();
        return view('bookregist', ['genders' => $genders, 'authors' => $authors]);
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
