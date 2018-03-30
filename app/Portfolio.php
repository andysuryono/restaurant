<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    //
	protected $table = 'portfolios';
	protected $fillable = ['name','images','mfilter'];
}
