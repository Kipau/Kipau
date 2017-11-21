<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin_Model extends Model
{
    protected $table = 'admin';
	protected $primaryKey = 'admin_username';
	public $incrementing = false;
}
