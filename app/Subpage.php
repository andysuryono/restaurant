<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subpage extends Model
{
    //
	protected $fillable = ['title','page_id','text'];

    public function page() {

    	return $this->belongsTo('App\Page');

    }
}
