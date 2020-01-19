<?php

namespace App\Http\Controllers;

use App\Author;
use App\Book;
use App\Gender;
use App\Inventory;
use App\Mail\aprobado;
use App\Order_Status;
use App\Orders;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

// My Books
    public function index()
    {
        $user = Auth::user();

        $orders = Orders::where('users_id', $user->id)
            ->with(['inventory', 'status'])
            ->paginate(10);
        return view('orders.mybooks')->with(['orders' => $orders]);
    }

//Home de Admin
public function home(Request $request)
    {
        $name = $request->input(('name'));
        $card = $request->input('card');
        $title = $request->input('title');
        $status = $request->input('status');

        $status_Orders = Order_Status::all();

        $orders = Orders::with(['user', 'inventory', 'status'])
            ->whereIn('orders.status_id', [1, 2, 4])
            ->status($status);

        if ($name) {
            $users = User::select('id')
                ->where('name', 'like', "%$name%")
                ->pluck('id')->toArray();

            $orders->whereIn('users_id', $users);
        }

        if ($card) {
            $cards = User::select('id')
                ->whereIn('card_id', 'like', "%$card%")
                ->pluck('id')->toArray();

            $orders->where('users_id', $cards);
        }

        if ($title)
        {
            $titles = Book::select('id')
                ->where('title', 'LIKE', "%$title%")
                ->pluck('id')->toArray();

            $inventory = Inventory::select('id')
                ->whereIn('book_id', $titles)
                ->pluck('id')->toArray();

            $orders->whereIn('inventories_id', $inventory);
        }

        $orders = $orders->paginate(10);

        return view('orders.index')->with(['orders_status' => $status_Orders, 'orders' => $orders]);

    }

// Home de Usuarios
    public function users(Request $request)
    {
        $scopeGender = $request->input('gender');
        $scopeTitle = $request->input('title');


        $genders = Gender::all();
        $authors = Author::all();

        $user = Auth::user();

        $orders = Orders::select('book_id')
            ->where('users_id', $user->id)
            ->whereNotIn('status_id', [5, 3, 6])
            ->pluck('book_id')->toArray();

        $books = Book::select('books.id', 'books.title', 'books.genres_id', 'books.author_id')
            ->join('inventories', 'books.id', 'inventories.book_id')
            ->where('inventories.status_id', 1)
            ->whereNotIn('books.id', $orders)
            ->groupBy('books.id', 'books.title', 'books.genres_id', 'books.author_id')
            ->orderBy('books.title', 'DESC')
            ->gender($scopeGender)
            ->title($scopeTitle)
            ->paginate(5);

        return view('orders.bookrequest', ['books' => $books, 'genders' => $genders, 'authors' => $authors]);
    }


// Crea ordeners por usuario
    public function store(Request $request)
    {
        $user = Auth::user();
        //$orders = Orders::where('users_id', $user->id);

        $inventories = Inventory::where('book_id', '=', $request->input('book_id'))
            ->where('status_id', 1)
            ->first();

        if ($inventories) {

            $newRequest = new Orders();
            $newRequest->users_id = $user->id;
            $newRequest->inventories_id = $inventories->id;
            $newRequest->status_id = '1';
            $newRequest->date_attention = Carbon::now();
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


        //Aprobado
        if ($request->input('status_id') == 2) {

            $inventory = Inventory::findOrFail($order->inventories_id);
            $book = Book::findOrFail($inventory->book_id);
            $user = User::findOrfail($order->users_id);

            Mail::to($user->email)->send(new aprobado($user,$book,$order));


            $order->status_id = $request->input('status_id');
            $order->date_attention = $now;

            $order->save();

            return response('ok, aprobado');
        }

        //denegado
        if ($request->input('status_id') == 3) {

            $order->status_id = $request->input('status_id');
            $order->date_attation = $now;

            $order->save();

            Inventory::findOrFail($order->inventories_id)
                ->update(['status_id' => 1]);

            return response('ok, denegado ');
        }
        //en uso
        if ($request->input('status_id') == 4) {

            $order->status_id = $request->input('status_id');
            $order->date_give = $now;
            $order->date_limit = $now->addDays(15);

            $order->save();

            return response('ok, en uso');
        }

        //Devuelto
        if ($request->input('status_id') == 5) {

            $order->status_id = $request->input('status_id');
            $order->date_receive = $now;

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
