<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bank_Model extends Model
{
	protected $table = 'bank';
	protected $primaryKey = 'bank_id';
	public $timestamps = false;
}
