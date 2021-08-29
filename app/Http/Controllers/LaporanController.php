<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    public function index()
    {
        // todo: count product
        // top 10 product
        // $data['g'] = DB::table('order_detail')
        //     ->join('product', 'order_detail.product_id', '=', 'product.id')
        //     ->selectRaw('order_detail, COUNT(order_detail.product_id) as count, product.product_name as name')
        //     ->distinct()
        //     ->groupBy('order_detail')
        //     ->orderByRaw('COUNT(order_detail.product_id) DESC')
        //     ->limit(10)->get();

        // top 10 customer
        $data['h'] = DB::table('orders')
            ->selectRaw('customer_id, COUNT(orders.customer_id) as count, users.first_name as first_name')
            ->distinct()
            ->join('users', 'orders.customer_id', '=', 'users.id')
            ->groupBy('customer_id')
            ->orderByRaw('COUNT(orders.customer_id) DESC')
            ->limit(10)->get();

        // todo: it may count by order not customer
        // top agent
        $data['i'] = DB::table('orders')
            ->selectRaw('agent_id, COUNT(orders.customer_id) as count, users.first_name as first_name')
            ->distinct()
            ->join('users', 'orders.agent_id', '=', 'users.id')
            ->groupBy('agent_id')
            ->orderByRaw('COUNT(orders.customer_id) DESC')
            ->limit(10)->get();

        return view('laporan.index', compact('data'));
    }

    // Laporan Jumlah Order Customer
    public function laporan2(Request $request)
    {
        $customer = new Order();
        $date_start = $request->get('date_start');
        $date_end = $request->get('date_end');

        // check are dates parameter exist
        if ($date_start && $date_end) {
            // filter dates
            $data = $customer
                ->where('order_time', '>=', "{$date_start} 00:00:00")
                ->where('order_time', '<=', "{$date_end} 00:00:00")
                ->paginate();
            $links = $data->appends(compact('date_start', 'date_end'))->links();
        } else {
            $data = $customer->paginate();
            $links = $data->links();
        }

        return view('laporan.2', compact('data', 'date_start', 'date_end', 'links'));
    }

    // Laporan Order Agent Oleh Customer Customer
    public function laporan3(Request $request)
    {
        $customer = new Order();
        $date_start = $request->get('date_start');
        $date_end = $request->get('date_end');

        // check are dates parameter exist
        if ($date_start && $date_end) {
            // filter dates
            $data = $customer
                ->where('order_time', '>=', "{$date_start} 00:00:00")
                ->where('order_time', '<=', "{$date_end} 00:00:00")
                ->paginate();
            $links = $data->appends(compact('date_start', 'date_end'))->links();
        } else {
            $data = $customer->paginate();
            $links = $data->links();
        }

        return view('laporan.3', compact('data', 'date_start', 'date_end', 'links'));
    }
}
