<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kurir_Model extends Model
{
    protected $table = 'kurir';
   protected $primaryKey = 'kurir_id';
    public $timestamps = false;
}
