<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Page extends Model
{
    //
    protected $table = 'pages';
	protected $fillable = ['name','alias','title','text','text2','images'];

    public function subpages() {
    	return $this->hasMany('App\Subpage');
    }
}
