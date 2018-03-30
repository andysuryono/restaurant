<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Service;

class ServiceController extends Controller
{
    //
    public function execute($alias) {

    	if (!$alias) {
    		abort(404);
    	}

    	if (view()->exists('site.service')) {

    		$service = Service::where('alias', strip_tags($alias))->first();

    		$data = [

    			'title' => $service->name,
    			'service' => $service

    		];

    		return view('site.service', $data);
    	} else {
    		abort(404);
    	}

    }
}
