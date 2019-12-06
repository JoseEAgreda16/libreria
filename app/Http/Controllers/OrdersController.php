<?php

namespace App\Http\Controllers;

use App\Book;
use App\Inventory;
use App\Orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('orders.mybooks');
    }



    public function store(Request $request)
    {
        $inventories = Inventory::where('book_id', '=', $request->input('book_id'))
            ->where('status_id','=',1)
            ->first();
       if ($inventories) {

           $user = Auth::user();
           $newrequest = new Orders();
           $newrequest->user_id = $user->id;
           $newrequest->inventories_id = $inventories->id ;
           $newrequest->status_id = '5';

           $newrequest->save();

           return response('Molo');

       }
       return response('se dio');

    }

    public function change($id,$status)
    {

    }

}
