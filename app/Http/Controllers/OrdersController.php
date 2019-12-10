<?php

namespace App\Http\Controllers;

use App\Book;
use App\Inventory;
use App\Orders;
use Carbon\Carbon;
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
        $user = Auth::user();

        $orders = Orders::where('users_id', $user->id)
            ->with(['inventory', 'status'])
            ->get();
        return view('orders.mybooks')->with(['orders' => $orders]);
    }



    public function store(Request $request)
    {$user = Auth::user();

        $user = Auth::user();
        $orders = Orders::where('users_id', $user->id);


        $inventories = Inventory::where('book_id', '=', $request->input('book_id'))
            ->where('status_id',1)
            ->first();

       if ($inventories) {

           $user = Auth::user();
           $newrequest = new Orders();
           $newrequest->users_id = $user->id;
           $newrequest->inventories_id = $inventories->id ;
           $newrequest->status_id = '5';
           $newrequest->date = Carbon::now();
           $newrequest->save();

           return response('Molo');

       }
        return response('se dio',400);
    }

    public function change(Request $request, $id)
    {
        $now = Carbon::now();
        Orders::findOrFail($id)
            ->update([
                'status_id' => $request->input('status_id'),
                'date_init' => $now,
                'date_end' => $now->addMonth()

            ]);
    }

}
