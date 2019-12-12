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
    {
        //$user = Auth::user();
        //$orders = Orders::where('users_id', $user->id);

        $inventories = Inventory::where('book_id', '=', $request->input('book_id'))
            ->where('status_id',1)
            ->first();

       if ($inventories) {


           $user = Auth::user();
           $newRequest = new Orders();
           $newRequest->users_id = $user->id;
           $newRequest->inventories_id = $inventories->id ;
           $newRequest->status_id = '1';
           $newRequest->date = Carbon::now();
           $newRequest->book_id = $inventories->book_id;

           $inventories->status_id = '2';

           $inventories->save();
           $newRequest->save();

           return response('ok');

       }
        return response('se dio);                                                                                                                                                                                           io',400);
    }

    public function change(Request $request, $id)
    {
        $now = Carbon::now();
        $order = Orders::findOrFail($id);


        if ($request->input('status_id') == 2) {

            $order-> status_id = $request->input('status_id');
            $order-> date_init = $now;
            $order-> date_end = $now->addMonth();

            $order-> save();

            return response('ok');
        }

        if ($request->input('status_id') == 3) {

        $order-> status_id = $request->input('status_id');

        $order-> save();

        Inventory::findOrFail($order->inventories_id)
             ->update(['status_id' => 1]);

         return response('ok');
        }

        return response('fail', 400);

    }

}
