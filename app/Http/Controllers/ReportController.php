<?php

namespace App\Http\Controllers;

use App\Orders;
use Barryvdh\DomPDF\Facade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function index($id)
    {
        $user = Auth::user();

        $orders =  Orders::findOrFail($id);

        return view('reports.contract')->with(['orders' => $orders, 'user' => $user]);
    }

    public function pdf($id)
    {
        $user = Auth::user();

        $orders =  Orders::findOrFail($id);

        $pdf = Facade::loadView('reports.contract', ['orders' => $orders, 'user' => $user]);

        return $pdf->download('contract.pdf');
    }
}
