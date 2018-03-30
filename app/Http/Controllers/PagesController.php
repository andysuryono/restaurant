<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Page;

class PagesController extends Controller
{
    //
    public function execute() {

    	if (view()->exists('admin.pages')) {
    		
	    	$pages = Page::with('subpages')->get();

	    	$data = [
	    		'title' => 'Pages',
	    		'pages' => $pages
	    	];

	    	return view('admin.pages',$data);
    	}

    }

    public function mexecute() {

    	if (view()->exists('manager.pages')) {
	    	$pages = Page::with('subpages')->get();
	    	$data = [
	    		'title' => 'Pages',
	    		'pages' => $pages
	    	];
	    	return view('manager.pages',$data);
    	}
    	abort(404);
    }
}
