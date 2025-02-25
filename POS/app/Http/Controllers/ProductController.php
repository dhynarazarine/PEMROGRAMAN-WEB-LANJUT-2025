<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function foodbeverage() {
        return view('POS.Product.foodbeverage');
    }
    public function beauty() {
        return view('POS.Product.beauty');
    }
    public function homecare() {
        return view('POS.Product.homecare');
    }
    public function baby() {
        return view('POS.Product.baby');
    }
}