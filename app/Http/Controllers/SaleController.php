<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function all()
    {
        $sales = Sale::all();
        return view('sale-all', ['sales' => $sales]);

    }
    public function del(Sale $sale)
    {

        $sale->delete();
        return redirect()->back();

    }
}
