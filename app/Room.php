<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Room extends Model
{
   use SoftDeletes;

    protected $fillable = [
    	'name','price','deposit',
    	'discount','description','photo',
    	'subcategory_id','location_id',
    	'calendar_id'
    ];

    public function subcategory()

    {
    	return $this->belongsTo('App\Subcategory'); 
    }

    public function location()

    {
    	return $this->belongsTo('App\Location'); 
    }

    
}
