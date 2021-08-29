<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';

    public function product_category()
    {
        return $this->hasOne('App\ProductCategory', 'id', 'category');
    }
}
