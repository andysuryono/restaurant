<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\People;

class PeopleController extends Controller
{
    //
    public function execute($alias) {

    	if (!$alias) {
    		abort(404);
    	}

    	if (view()->exists('site.people')) {

    		$people = People::where('alias', strip_tags($alias))->first();

    		$data = [

    			'title' => $people->name,
    			'people' => $people

    		];

    		return view('site.people', $data);
    	} else {
    		abort(404);
    	}

    }
}
