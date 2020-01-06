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

        return view('', compact('user'));
    }

    public function pdf()
    {
        /**
         * toma en cuenta que para ver los mismos
         * datos debemos hacer la misma consulta
         **/
        $products = Orders::all();

        $pdf = \PDFlib::loadView('pdf.products', compact('products'));

        return $pdf->download('listado.pdf');
    }
}
