<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $data = Product::paginate();
        return view('product.index', compact('data'));
    }
}
