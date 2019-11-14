<?php

namespace App\Http\Controllers;

use App\Gender;
use Illuminate\Http\Request;

class GenderController extends Controller
{

    public function index()
    {


        $gender = Gender::all();

        return view('authors')->with([
            'name' => $gender
        ]);

    }

    public function show($name)
    {
        Gender::findOrFail($name);

    }


    public function  add(Request $request)
    {
        $newgender = new Author($request->all());
        $newgender->save();
    }

    public function update(Request $request, $name)
    {
        Gender::findOrFail($name)->update($request->all());

    }

    public function delete( $name)
    {

        Gender::findOrFail($name)->delete();

    }
}
