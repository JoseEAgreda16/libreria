<?php

namespace App\Http\Controllers;

use App\Orders;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        $products = Orders::all();

        return view('report.contract', compact('products'));
    }

    public function pdf()
    {
        /**
         * toma en cuenta que para ver los mismos
         * datos debemos hacer la misma consulta
         **/
        $products = Orders::all();

        $pdf = PDF::loadView('pdf.products', compact('products'));

        return $pdf->download('listado.pdf');
    }
}
