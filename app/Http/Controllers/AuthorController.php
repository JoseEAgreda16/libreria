<?php

namespace App\Http\Controllers;

use App\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthorController extends Controller
{

    public function index()
    {


        $author = Author::all();

        return view('authors')->with([
            'name' => $author
        ]);

    }

    public function show($name)
    {
      Author::findOrFail($name);

    }

    public function  add(Request $request)
    {
        $newauthor = new Author($request->all());
        $newauthor->save();
    }

    public function update(Request $request, $name)
    {
        Author::findOrFail($name)->update($request->all());

    }

    public function delete( $name)
    {

        Author::findOrFail($name)->delete();

    }
}
