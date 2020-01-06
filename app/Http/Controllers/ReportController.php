<?php

namespace App\Http\Controllers;

use App\Orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $orders = Orders::where('users_id', $user->id)
                        ->where('status_id', 2)
                        ->with('inventory');


        return view('reports.contract')->with(['orders' => $orders, 'user' => $user]);
    }

    public function pdf()
    {
        /**
         * toma en cuenta que para ver los mismos
         * datos debemos hacer la misma consulta
         **/
        $user = Auth::user();

        $orders = Orders::where('users_id', $user->id)
            ->where('status_id', 2)
            ->with('inventory');


        $pdf = \PDFlib::loadView('reports.contract')->with(['orders' => $orders, 'user' => $user]);

        return $pdf->download('contract.pdf');
    }
}
