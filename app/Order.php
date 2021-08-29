<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
    public function agent()
    {
        return $this->hasOne('App\User', 'id', 'agent_id');
    }

    public function customer()
    {
        return $this->hasOne('App\User', 'id', 'customer_id');
    }

    public function order_detail()
    {
        return $this->hasOne('App\OrderDetail', 'order_id', 'id');
    }

    public function countQty()
    {
        return DB::table('orders')
            ->where('orders.customer_id', $this->customer_id)
            ->join('order_detail', 'orders.id', '=', 'order_detail.order_id')
            ->sum('order_detail.qty');
    }
}
