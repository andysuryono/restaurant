<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Subpage;

class SubpagesController extends Controller
{
    //
    public function execute() {

    	if (view()->exists('admin.subpages')) {
    		
	    	$subpages = Subpage::all();

	    	$data = [
	    		'title' => 'Subpages',
	    		'subpages' => $subpages
	    	];

	    	return view('admin.subpages',$data);
    	}

    }
}
