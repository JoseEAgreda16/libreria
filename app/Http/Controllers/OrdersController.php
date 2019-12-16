<?php

namespace App\Http\Controllers;

use App\Author;
use App\Book;
use App\Gender;
use App\Inventory;
use App\Orders;
use App\User;
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

    public function home()
    {
        $orders = Orders::with(['user', 'inventory', 'status'])
            ->whereIn('status_id', [1, 2, 4])
            ->get();
        return view('orders.index')->with(['orders' => $orders]);


    }
    public function users(Request $request)
    {
        $scopeGender = $request->get('gender');
        $scopeTitle = $request->get('tittle');
        $scopeAuthor = $request->get('author');

        $genders     = Gender::all();
        $authors     = Author::all();

        $user = Auth::user();

        $orders = Orders::select('book_id')
            ->where('users_id', $user->id)
            ->whereNotIn('status_id', [5, 3, 6])
            ->pluck('book_id')->toArray();

        $books = Book::select('books.*')
            ->join('inventories', 'books.id', 'inventories.book_id')
            ->where('inventories.status_id', 1)
            ->whereNotIn('books.id', $orders)
            ->distinct()
            ->orderBy('books.tittle', 'DESC')
            ->Gender($scopeGender)
            ->Tittle($scopeTitle)
            ->paginate(5)
            ->get();

        return view('orders.bookrequest', ['books' => $books, 'genders' => $genders, 'authors' => $authors]);
    }



    public function store(Request $request)
    {
        //$user = Auth::user();
        //$orders = Orders::where('users_id', $user->id);

        $inventories = Inventory::where('book_id', '=', $request->input('book_id'))
            ->where('status_id', 1)
            ->first();

        if ($inventories) {


            $user = Auth::user();
            $newRequest = new Orders();
            $newRequest->users_id = $user->id;
            $newRequest->inventories_id = $inventories->id;
            $newRequest->status_id = '1';
            $newRequest->date = Carbon::now();
            $newRequest->book_id = $inventories->book_id;

            $inventories->status_id = '2';

            $inventories->save();
            $newRequest->save();

            return response('ok');

        }
        return response('se dio);                                                                                                                                                                                           io', 400);
    }


//gestion de administrador (rechazar o aceptar ordernes)

    public function changeStatus(Request $request, $id)
    {
        $now = Carbon::now();
        $order = Orders::findOrFail($id);


        if ($request->input('status_id') == 2) {

            $order->status_id = $request->input('status_id');
            $order->date = $now;

            $order->save();

            return response('ok, aprobado');
        }

        if ($request->input('status_id') == 3) {

            $order->status_id = $request->input('status_id');
            $order->date = $now;

            $order->save();

            Inventory::findOrFail($order->inventories_id)
                ->update(['status_id' => 1]);

            return response('ok, denegado ');
        }

        if ($request->input('status_id') == 4) {

            $order->status_id = $request->input('status_id');
            $order->date_init = $now;

            $order->save();

            return response('ok, en uso');
        }


        if ($request->input('status_id') == 5) {

            $order->status_id = $request->input('status_id');
            $order->date_end = $now;

            $order->save();

            Inventory::findOrFail($order->inventories_id)
                ->update(['status_id' => 1]);

            return response('ok, de vuelto');
        }


        return response('fail', 400);

    }


    public function cancelOrders($id)
    {
        $order = Orders::findOrFail($id);


        $order->status_id = 6;

        $order->save();

        Inventory::findOrFail($order->inventories_id)
            ->update(['status_id' => 1]);

        return response('ok');
    }


}
