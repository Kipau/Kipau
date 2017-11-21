<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company_Profile_Model extends Model
{
    protected $table = 'company_profile';
	protected $primaryKey = 'profile_id';
	public $timestamps = false;
}
