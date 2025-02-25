<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function sales() {
        return view('POS.sale');
    }
}
