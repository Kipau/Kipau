<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order_Model extends Model
{
    protected $table = 'order_produk';
	protected $primaryKey = 'order_id';
	public $timestamps = false;
}
