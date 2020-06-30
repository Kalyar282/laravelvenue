<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Location extends Model
{
	use SoftDeletes;

    protected $fillable = [
    	'address'
    ];

    public function rooms()

    {
    	return $this->hasMany('App/Room');
    }

 }
