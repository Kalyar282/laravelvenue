<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubCategory extends Model
{
    use SoftDeletes;
    protected $table='subcategories';

    protected $fillable =[
    	'name','category_id'];

     public function Category()

    {
    	return $this->belongsTo('App\Category'); 
    }

     public function rooms()

    {
    	return $this->hasMany('App/Room');
    }

   
}