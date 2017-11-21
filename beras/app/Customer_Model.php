<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer_Model extends Model
{
	protected $table = 'customer';
	protected $primaryKey = 'customer_id';
	// public $timestamps = false;
}
