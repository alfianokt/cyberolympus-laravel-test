<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        // todo: still ambigous about item and qty
        // $data = Order::distinct('customer_id');
        // $query = DB::table('orders')->select('customer_id')->distinct();
        // dd($query);


        $data = Order::paginate();
        return view('order.index', compact('data'));
    }
}
